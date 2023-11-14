<?php

namespace App\DataTables;

use App\Models\LogTransaksi;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LogTransaksiDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            // ->addColumn('action', '')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(LogTransaksi $model): QueryBuilder
    {
        return $model->newQuery()
            ->select([
                'log_transaksi.id as id',
                'log_transaksi.id_obat as id_obat',
                'log_transaksi.tipe as tipe',
                'obat.nama_obat as nama_obat',
                'detail_penerimaan.stock_masuk as jumlah_terima',
                'detail_penerimaan.total_harga as harga_terima',
                'penjualan.total_barang as jumlah_jual',
                'penjualan.total_harga as harga_jual',
                DB::raw('
                    IF(log_transaksi.id_penerimaan IS NOT NULL, 
                        detail_penerimaan.stock_masuk,
                        penjualan.total_barang
                    ) AS jumlah,
                    IF(log_transaksi.id_penerimaan IS NOT NULL, 
                        DATE_FORMAT(detail_penerimaan.tanggal, "%d-%m-%Y"),
                        DATE_FORMAT(penjualan.tanggal_transaksi, "%d-%m-%Y")
                    ) AS tanggal,
                    IF(log_transaksi.id_penerimaan IS NOT NULL, 
                        detail_penerimaan.total_harga,
                        penjualan.total_harga
                    ) AS harga'),
                    ])
                ->leftJoin('detail_penerimaan', 'log_transaksi.id_penerimaan', '=', 'detail_penerimaan.id')
                ->leftJoin('penjualan', 'log_transaksi.id_penjualan', '=', 'penjualan.id')
                ->leftJoin('obat', 'log_transaksi.id_obat', '=', 'obat.id');


    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('logtransaksi-table')
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
            Column::make('id'),
            Column::make('id_obat'),
            Column::make('nama_obat'),
            Column::make('tipe'),
            Column::make('tanggal')->title('Tanggal'),
            Column::make('jumlah')->title('Jumlah'),
            Column::make('harga')->title('Harga'),
        ];
    }

    

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'LogTransaksi_' . date('YmdHis');
    }
}
