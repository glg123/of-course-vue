<?php

namespace App\DataTables;

use App\Enums\ReviewEnum;
use App\Models\DietitianAppointment;
use App\Models\Order;
use App\Models\Review;
use Carbon\Carbon;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class DAppointmentDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.page.dietitian_appointment.btn.btn')
            ->addColumn('dateTime', function ($row) {
                return Carbon::parse($row->date)->format('y-m-d') . Carbon::parse($row->time)->format('H:i a');
            })->editColumn('payment_status', function ($row) {
                return "<span class='status-active'>" . $row->payment_status . "</span>";
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at->format('y-m-d');
            })
            ->addIndexColumn()

            ->rawColumns([
                'payment_status',
                'created_at',
                'dateTime',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StaffUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(DietitianAppointment $model)
    {
        return $model->with('user', 'dietitian')->newQuery();
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
            Column::make('user_id')->data('user.first_name.en')->title(__('views.customer')),
            Column::make('user_id')->data('user.phone')->title(__('views.mobile')),
            Column::make('dietitian_id')->data('dietitian.first_name.en')->title(__('views.name')),
            Column::make('created_at')->title(__('views.date')),
            Column::make('dateTime')->title(__('views.Date_hiring')),
            Column::make('payment_status')->title(__('views.payment_status')),

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
