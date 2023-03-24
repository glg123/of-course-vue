<?php

namespace App\DataTables;

use App\Models\Location;
use App\Models\Zone;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ZoneDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.page.location.zone.btn.btn')

            ->addIndexColumn()
            ->addColumn('getArea', function ($row) {
               
                return $row->area ? $row->area->name : '';
            })
            ->rawColumns([
                'action',
                'getArea',
                // 'role',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StaffUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Zone $model)
    {
        return $model->with('area')->when(request()->has('q'), function ($query) {
            return $query->where('name', 'like', '%' . request('q') . '%');
        })->when(request()->boolean('trashed') === true, function ($query) {
            $query->onlyTrashed();
        })->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('zone-table')
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
            Column::make('name')->data('name.en')->title('النطاق'),
            Column::make('getArea')->title('المنطقة'),
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
        return 'zone' . date('YmdHis');
    }
}
