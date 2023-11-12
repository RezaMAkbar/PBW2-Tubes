<?php

namespace App\DataTables;

use App\Models\Image;
use App\Models\Obat;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ObatDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('action', function ($obat) {
                return '<a href="/editObat/' . $obat->id . '" class="btn btn-primary">Edit</a>';
            }) //edit column so that the button is shown
            ->addColumn('image', function ($obat) {
                // Fetch images for the meds
                $images = Image::where('id_obat', $obat->id)->get();

                $html = '';
                foreach ($images as $image) {
                    $html .= '<img src=" storage/' . $image->path . '" border="0" width="40" class="img-rounded" align="center" />';
                }

                return $html;
            })
            ->setRowId('id')
            ->rawColumns(['action', 'image']); //for the image and button
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Obat $model): QueryBuilder
    {
        return $model->newQuery()->select([
            'obat.id',
            'obat.nama_obat',
            DB::raw("DATE_FORMAT(obat.tanggal_masuk, '%d-%m-%Y') as tanggal_masuk"),
            'obat.stock',
            'obat.harga',
            DB::raw("DATE_FORMAT(obat.expired, '%d-%m-%Y') as expired"),
            'obat.no_batch',
            DB::raw('(SELECT stok_opname.tempat_simpan FROM stok_opname WHERE stok_opname.id_obat = obat.id) as tempat_simpan'),
        ]);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('obat-table')
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
            Column::make('id'),
            Column::computed('image')
            ->title('Image')
            ->exportable(false)
            ->printable(false)
            ->width(100)
            ->addClass('text-center'),
            Column::make('nama_obat'),
            Column::make('stock'),
            Column::make('harga'),
            Column::make('tanggal_masuk')
                ->title('Tanggal Masuk'),
            Column::make('expired'),
            Column::make('no_batch'),
            Column::make('tempat_simpan'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Obat_' . date('YmdHis');
    }
}
