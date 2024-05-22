<?php

namespace App\DataTables;

use App\Models\StokOpname;
use App\Models\StokOpnameSpesifik;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\DB;

class StokOpnameSpesifikDataTable extends DataTable
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
            return '<a href="' . route('stockOpname.editStockOpname', $stokopname->sid) . '" class="btn btn-primary">Edit</a>
            <a href="' . route('stockOpname.tambahStockOpname', $stokopname->sid) . '" class="btn btn-primary" style="margin-top: 5px;">Tambah</a>';
        });

        // Custom search logic
        $dataTable->filter(function ($query) {
            if ($keyword = request('search')['value']) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('stok_opname.tempat_simpan', 'LIKE', "%{$keyword}%")
                    ->orWhere(DB::raw("DATE_FORMAT(stok_opname.tanggal_simpan, '%d-%m-%Y')"), 'LIKE', "%{$keyword}%")
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
            'stok_opname.tempat_simpan as so_tempat',
            'stok_opname.tanggal_simpan as so_tanggal',
            'stok_opname.sisa_stock as so_sisa',
            'stok_opname.keterangan',
            'stok_opname.stok_keluar as so_keluar',
            'obat.id as oId',
            'obat.nama_obat',
            'obat.expired as o_exp',
            'obat.no_batch as o_batch',
            'detail_penerimaan.id as dp_id',
            'detail_penerimaan.id_obat as dp_idObat',
            'detail_penerimaan.stock_masuk as dp_masuk',
            'detail_penerimaan.no_nota as dp_nota',
        ])
        ->leftJoin('obat', 'stok_opname.id_obat', '=', 'obat.id')
            ->leftJoin('detail_penerimaan', function ($join) {
                $join->on('stok_opname.id_obat', '=', 'detail_penerimaan.id_obat');
            })
            ->where('stok_opname.id', $this->stokOpnameId);
        
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('stokopnamespesifik-table')
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
            ->title('ID'),
            Column::make('so_tanggal')
            ->title('Tgl.'),
            Column::make('dp_nota')
            ->title('No. Nota'),
            Column::make('o_batch')
            ->title('No. Batch'),
            Column::make('o_exp')
            ->title('Exp.'),
            Column::make('nama_obat'),
            Column::make('keterangan'),
            Column::make('dp_masuk'),
            Column::make('so_keluar')
            ->title('Keluar'),
            Column::make('so_sisa')
            ->title('Sisa'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'StokOpnameSpesifik_' . date('YmdHis');
    }

    protected $stokOpnameId;

    public function setStokOpnameId($stokOpnameId)
    {
        $this->stokOpnameId = $stokOpnameId;
    }
}
