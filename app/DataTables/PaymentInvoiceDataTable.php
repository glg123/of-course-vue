<?php

namespace App\DataTables;

use App\Enums\ReviewEnum;
use App\Models\Order;
use App\Models\Review;
use App\Models\UserSubscription;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PaymentInvoiceDataTable extends DataTable
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
            // ->addColumn('action', )
            ->addColumn('action', function ($row) {


                return view('dashboard.page.payment.btn.btn', compact('row'));
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at->format('y-m-d H:i');
            })
            ->editColumn('discount', function ($row) {
                return $row->discount . 'دك';
            })
            ->editColumn('total', function ($row) {
                return $row->total . 'دك';
            })
            ->addIndexColumn()
            ->rawColumns([
                'created_at',
                'discount',
                'total',
                'action',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StaffUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UserSubscription $model)
    {
        return $model->with('user')->newQuery();
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

            Column::make('id')->data('DT_RowIndex')->title('#'),
            Column::make('user_id')->data('user.first_name.en')->title(__('views.customer_name')),
            Column::make('user_id')->data('user.phone')->title(__('views.mobile')),
            Column::make('created_at')->title(__('views.created_at')),
            Column::make('subscrition_type')->title(__('views.subscrition_type')),
            Column::make('type')->title(__('views.payment_type')),
            Column::make('qty')->title(__('views.qty')),
            Column::make('discount')->title(__('views.discount')),
            Column::make('total')->title(__('views.total')),
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
        return 'driverUsers_' . date('YmdHis');
    }
}
