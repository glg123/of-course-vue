<?php

namespace App\DataTables;

use App\Enums\FoodStockEnum;
use App\Enums\InvoiceEnum;
use App\Models\Copoun;
use App\Models\Faq;
use App\Models\Food;
use App\Models\FoodStock;
use App\Models\User;
use App\Repositories\RoleRepository;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class FoodAdjustDataTable extends DataTable
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
            ->addColumn('oldStock', function ($row) {
                return  $row->settings ? $row->settings['old_stock'] ?? '-' : 0;
            })
            ->addColumn('comment', function ($row) {
                return  $row->settings ? $row->settings['comment'] ?? '-' : '__';
            })

            ->addIndexColumn()

            ->rawColumns([
                'action',
                'oldStock',
                'comment'
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
        return $model->with('food')->whereType(FoodStockEnum::IN_WARD)->newQuery();
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
            Column::make('food_id')->data('food.code')->title(__('views.code')),
            Column::make('oldStock')->title(__('views.quantity')),
            Column::make('stock')->title(__('views.new_quantity')),
            Column::make('comment')->title(__('views.comment')),
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
