<?php

namespace App\DataTables;

use App\Models\Location;
use App\Models\Zone;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ZoneDriverDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.page.location.zone_driver.btn.btn')

            ->addIndexColumn()
            ->addColumn('evening_driverView', function ($row) {
                return$row->evening_driver ? $row->evening_driver->first_name : '';
            })
            ->addColumn('morning_driverView', function ($row) {
                return$row->morning_driver ? $row->morning_driver->first_name : '';
            })
            ->rawColumns([
                'action',
                'morning_driverView',
                'evening_driverView',
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
        return $model->with('evening_driver','morning_driver')->whereNotNull('morning_driver_id')->orWhere('evening_driver_id','!=',null)->newQuery();
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
            Column::make('morning_driverView')->title('سائقي الفترة الصباحية')->searchable(false)->orderable(false),
            Column::make('evening_driverView')->title('سائقي الفترة المسائية')->searchable(false)->orderable(false),
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
