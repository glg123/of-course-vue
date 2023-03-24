<?php

namespace App\DataTables;

use App\Enums\FoodStockEnum;
use App\Models\Food;
use App\Models\FoodStock;
use Carbon\Carbon;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class FoodPurchaseItemDataTable extends DataTable
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
            ->addColumn('getTotla', function ($row) {
                return $row->stock * $row->price . 'دك';
            })

            ->addIndexColumn()

            ->rawColumns([
                'action',
                'getTotla',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StaffUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(FoodStock $model)
    {
        return $model->with('food','invoice')->whereType(FoodStockEnum::PURCHASE)->newQuery();
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
            Column::make('food_id')->data('food.name.en')->title(__('views.item_name')),
            Column::make('reference')->data('invoice.supplier_name')->title(__('views.supplier_name')),
            Column::make('stock')->title(__('views.quantity')),
            Column::make('price')->title(__('views.unit_price')),
            Column::make('getTotla')->title(__('views.total')),
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
