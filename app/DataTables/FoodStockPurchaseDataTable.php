<?php

namespace App\DataTables;

use App\Enums\FoodStockEnum;
use App\Enums\InvoiceEnum;
use App\Models\Copoun;
use App\Models\Faq;
use App\Models\Food;
use App\Models\Invoice;
use App\Models\User;
use App\Repositories\RoleRepository;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class FoodStockPurchaseDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.page.food.stock.btn.btn')
            ->addColumn('getPrice', function ($row) {


                return  $row->price * $row->qty . 'د ك';
            })

            ->addIndexColumn()

            ->rawColumns([
                'action',
                'getPrice',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StaffUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Invoice $model)
    {
        return $model->whereType(InvoiceEnum::PURCHASE)->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('Stocks-table')
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
            Column::make('invoice_id')->title(__('views.invoice_number')),
            Column::make('supplier_name')->title(__('views.supplier_name')),
            Column::make('getPrice')->title(__('views.total')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Stocks_' . date('YmdHis');
    }
}
