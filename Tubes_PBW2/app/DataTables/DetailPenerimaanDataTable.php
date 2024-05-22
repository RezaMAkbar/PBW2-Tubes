<?php

namespace App\DataTables;

use App\Models\DetailPenerimaan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Services\DataTable;

class DetailPenerimaanDataTable extends DataTable
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
                    $q->where('detail_penerimaan.id', 'LIKE', "%{$keyword}%")
                      ->orWhere('detail_penerimaan.no_nota', 'LIKE', "%{$keyword}%")
                      ->orWhere('detail_penerimaan.username', 'LIKE', "%{$keyword}%")
                      ->orWhere(DB::raw("DATE_FORMAT(detail_penerimaan.tanggal, '%d-%m-%Y')"), 'LIKE', "%{$keyword}%")
                      ->orWhere('detail_penerimaan.stock_masuk', 'LIKE', "%{$keyword}%")
                      ->orWhere('detail_penerimaan.total_harga', 'LIKE', "%{$keyword}%")
                      ->orWhere('detail_penerimaan.harga_beli', 'LIKE', "%{$keyword}%")
                      ->orWhere('detail_penerimaan.id_obat', 'LIKE', "%{$keyword}%")
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
    public function query(DetailPenerimaan $model): QueryBuilder
    {
        return $model->newQuery()
        ->select([
            'detail_penerimaan.id as dp_id',
            'detail_penerimaan.no_nota as dp_nota',
            'detail_penerimaan.tanggal as dp_date',
            'detail_penerimaan.username as dp_name',
            'detail_penerimaan.harga_beli as dp_buyPrice',
            'detail_penerimaan.total_harga as dp_totalPrice',
            'detail_penerimaan.id_obat as dp_idObat',
            'detail_penerimaan.stock_masuk as dp_stock',
            'obat.id as oid',
            'obat.nama_obat as o_nama'
        ])
        ->leftJoin('obat', 'detail_penerimaan.id_obat', '=', 'obat.id');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('detailpenerimaan-table')
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
            Column::make('dp_id')
            ->title('ID Transaksi')
            ->width(60),
            Column::make('dp_idObat')
            ->title('ID Obat')
            ->width(60),
            Column::make('o_nama')
            ->title('Nama Obat')
            ->width(80),
            Column::make('dp_nota')
            ->title('No. Nota')
            ->width(90),
            Column::make('dp_name')
            ->title('Nama Penjaga')
            ->width(60),
            Column::make('dp_date')
            ->title('Tanggal Transaksi')
            ->width(60),
            Column::make('dp_buyPrice')
            ->title('Harga Beli')
            ->width(60),
            Column::make('dp_totalPrice')
            ->title('Total Harga')
            ->width(60),
            Column::make('dp_stock')
            ->title('Stok Masuk')
            ->width(60),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'DetailPenerimaan_' . date('YmdHis');
    }

    
}
