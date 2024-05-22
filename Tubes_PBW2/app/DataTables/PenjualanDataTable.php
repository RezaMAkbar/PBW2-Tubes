<?php

namespace App\DataTables;

use App\Models\Penjualan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PenjualanDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $dataTable = new EloquentDataTable($query);
        $dataTable->filter(function ($query) {
            if ($keyword = request()->input('search.value')) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('penjualan.id', 'LIKE', "%{$keyword}%")
                      ->orWhere('penjualan.username', 'LIKE', "%{$keyword}%")
                      ->orWhere(DB::raw("DATE_FORMAT(penjualan.tanggal_transaksi, '%d-%m-%Y')"), 'LIKE', "%{$keyword}%")
                      ->orWhere('penjualan.total_barang', 'LIKE', "%{$keyword}%")
                      ->orWhere('penjualan.total_harga', 'LIKE', "%{$keyword}%")
                      ->orWhere('penjualan.id_obat', 'LIKE', "%{$keyword}%")
                      ->orWhere('obat.id', 'LIKE', "%{$keyword}%")
                      ->orWhere('obat.nama_obat', 'LIKE', "%{$keyword}%");
                });
            }
        });

        return $dataTable->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Penjualan $model): QueryBuilder
    {
        return $model->newQuery()
        ->select([
            'penjualan.id as p_id',
            'penjualan.username as p_name',
            'penjualan.tanggal_transaksi as p_date',
            'penjualan.total_harga as p_priceTotal',
            'penjualan.id_obat as p_idObat',
            'penjualan.total_barang as p_itemTotal',
            'obat.id as oid',
            'obat.nama_obat as o_nama'
        ])
        ->leftJoin('obat', 'penjualan.id_obat', '=', 'obat.id');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('penjualan-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->width(60)
            //       ->addClass('text-center'),
            Column::make('p_id')
            ->title('ID Transaksi'),
            Column::make('p_idObat')
            ->title('ID Obat'),
            Column::make('o_nama')
            ->title('Nama Obat'),
            Column::make('p_name')
            ->title('Nama Penjaga'),
            Column::make('p_date')
            ->title('Tanggal Transaksi'),
            Column::make('p_itemTotal')
            ->title('Total Barang'),
            Column::make('p_priceTotal')
            ->title('Harga Total'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Penjualan_' . date('YmdHis');
    }
}
