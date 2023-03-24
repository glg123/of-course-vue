<?php

namespace App\DataTables;

use App\Enums\FoodStockEnum;
use App\Models\Food;
use App\Models\FoodStock;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class FoodDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.page.food.master.btn.btn')
            ->addIndexColumn()
            ->rawColumns([
                'action',

            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StaffUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Food $model)
    {
        return $model->with('unit')->newQuery();
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
            Column::make('name')->data('name.ar')->title(__('views.item_name').  ' English'),
            Column::make('name')->data('name.en')->title(__('views.item_name').  ' عربي'),
            Column::make('category_name')->title(__('views.trade_mark')),
            Column::make('unit_id')->data('unit.name.ar')->title(__('views.Weight_unit')),
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
        return 'Stocks_' . date('YmdHis');
    }
}
