<?php

namespace App\DataTables;

use App\Models\StokOpname;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\DB;

class StokOpnamesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $dataTable = new EloquentDataTable($query);

        $dataTable->addColumn('action', function ($stokopname) {
            return '<a href="' . route('stockOpname.spesifikStockOpname', $stokopname->sid) . '" class="btn btn-primary">View Spesifik</a>';
        });

        // Custom search logic
        $dataTable->filter(function ($query) {
            if ($keyword = request('search')['value']) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('stok_opname.tempat_simpan', 'LIKE', "%{$keyword}%")
                      ->orWhere(DB::raw("DATE_FORMAT(stok_opname.tanggal_simpan, '%d-%m-%Y')"), 'LIKE', "%{$keyword}%")
                      ->orWhere('stok_opname.tanggal_simpan', 'LIKE', "%{$keyword}%")
                      ->orWhere('stok_opname.sisa_stock', 'LIKE', "%{$keyword}%")
                      ->orWhere('stok_opname.keterangan', 'LIKE', "%{$keyword}%")
                      ->orWhere('stok_opname.stok_keluar', 'LIKE', "%{$keyword}%")
                      ->orWhere('obat.nama_obat', 'LIKE', "%{$keyword}%")
                      ->orWhere('obat.stock', 'LIKE', "%{$keyword}%")
                      ->orWhere('obat.harga', 'LIKE', "%{$keyword}%");
                });
            }
        });

        return $dataTable->setRowId('sid');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(StokOpname $model): QueryBuilder
    {
        return $model->newQuery()
        ->select([
            'stok_opname.id as sid',
            'stok_opname.id_obat as sIdObat',
            'stok_opname.tempat_simpan',
            'stok_opname.tanggal_simpan',
            'stok_opname.sisa_stock',
            'stok_opname.keterangan',
            'stok_opname.stok_keluar',
            'obat.id',
            'obat.nama_obat',
            'obat.stock',
            'obat.harga',
        ])
        ->leftJoin('obat', 'stok_opname.id_obat', '=', 'obat.id');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('stokopnames-table')
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
        Column::computed('action')
              ->exportable(false)
              ->printable(false)
              ->width(60)
              ->addClass('text-center'),
        Column::make('sid')
              ->title('ID')
              ->width(50),
        Column::make('sIdObat')
              ->title('ID Obat')
              ->width(60),
        Column::make('nama_obat')
              ->width(150),
        Column::make('harga')
              ->width(80),
        Column::make('stock')
              ->width(80),
    ];
}

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'StokOpnames_' . date('YmdHis');
    }
}
