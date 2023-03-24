<?php

namespace App\DataTables;

use App\Models\Location;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class BlockDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'dashboard.page.location.block.btn.btn')

            ->addIndexColumn()

            ->rawColumns([
                'action',
                // 'active_text',
                // 'role',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StaffUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Location $model)
    {
        return $model->with('area')->when(request()->has('q'), function ($query) {
            return $query->where('name', 'like', '%' . request('q') . '%');
        })->when(request()->boolean('trashed') === true, function ($query) {
            $query->onlyTrashed();
        })->whereType(Location::BLOCK_TYPE)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('block-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, 'الكل']],
            ]);;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('name')->data('name.en')->title('القطعه Block	 (باللغة العربية)'),
            Column::make('area_id')->data('area.name.ar')->title('المنطقة '),
            Column::make('action')->title('')->searchable(false)->orderable(false),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'block' . date('YmdHis');
    }
}
