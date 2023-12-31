<?php

namespace Yajra\DataTables\Contracts;

interface DataTableHtmlBuilder
{
    /**
     * Handle building of dataTables html.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function handle();
}
