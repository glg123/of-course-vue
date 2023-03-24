<?php

namespace App\DataTables;

use App\Enums\ReviewEnum;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Review;
use App\Models\UserSubscription;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class NotificationDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.page.notification.btn.btn')


            ->addColumn('date', function ($row) {
                return $row->created_at->format('Y-m-d');
            })
            ->addColumn('time', function ($row) {
                return $row->created_at->format('H:i A');
            })
            ->addIndexColumn()

            ->rawColumns([
                'date',
                'time',

            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StaffUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Notification $model)
    {
        return $model->where('type', 'main_dashboard')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('driverUsers-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, __('views.all')]],
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

            Column::make('id')->data('DT_RowIndex')->title('#'),
            Column::make('body')->data('body.en')->title(__('views.name')),
            Column::make('date')->title(__('views.date')),
            Column::make('time')->title(__('views.time')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'driverUsers_' . date('YmdHis');
    }
}
