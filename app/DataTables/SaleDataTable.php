<?php

namespace App\DataTables;

use App\Models\Order;
use App\Models\User;
use App\Repositories\RoleRepository;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SaleDataTable extends DataTable
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
            ->addIndexColumn();

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StaffUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        return $model->with('user',
            'delivery',
            'trainer',
            'meal',
            'user_subscription',
        //    'package_varient',
            'order_tag',
        );
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('staffusers-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, __('views.all')]],
            ]);
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
            Column::make('user_id')->data('user.first_name.en')->title(__('views.customer_name')),
            Column::make('tags')->data('order_tag.name')->title(__('views.tags')),
            Column::make('user_id')->title(__('views.customer_id')),
            Column::make('phone')->data('user.phone')->title(__('views.mobile')),
            Column::make('area_id')->title(__('views.area')),
            Column::make('status')->title(__('views.status')),
            Column::make('shift_time')->title(__('views.shift_time')),
            Column::make('user_subscription_id')->data('user_subscription.type')->title(__('views.user_subscription')),
            Column::make('status')->title(__('views.status')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'StaffUsers_' . date('YmdHis');
    }
}
