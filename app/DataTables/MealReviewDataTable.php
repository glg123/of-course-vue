<?php

namespace App\DataTables;

use App\Enums\ReviewEnum;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;
use App\Repositories\RoleRepository;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MealReviewDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.page.meal_review.btn.btn')
            ->addColumn('delivery_at', function ($row) {

                return $row->modelable_id ? Order::find($row->modelable_id)->delivery_at : null  ;
            })->addColumn('meal_name', function ($row) {
                return $row->modelable_id ? Order::find($row->modelable_id)->meal ? Order::find($row->modelable_id)->meal->name : 'تم الحذف' : null  ;
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at->format('y-m-d')  ;
            })
            ->addIndexColumn()

            ->rawColumns([
                'meal_name',
                'delivery_at',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StaffUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Review $model)
    {
        return $model->with('item','user')->whereType(ReviewEnum::ORDER_TYPE)->newQuery();
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

            Column::make('delivery_at')->title(__('views.customer_name')),
            Column::make('score')->title(__('views.score')),
            Column::make('user_id')->data('user.first_name.en')->title(__('views.customer_name')),
            Column::make('user_id')->data('user.phone')->title(__('views.mobile')),
            Column::make('meal_name')->title(__('views.customer_name')),
            Column::make('created_at')->title(__('views.customer_name')),
            Column::make('review')->title(__('views.customer_name')),

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
