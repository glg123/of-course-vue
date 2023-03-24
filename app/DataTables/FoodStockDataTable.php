<?php

namespace App\DataTables;

use App\Enums\FoodStockEnum;
use App\Models\Copoun;
use App\Models\Faq;
use App\Models\Food;
use App\Models\User;
use App\Repositories\RoleRepository;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class FoodStockDataTable extends DataTable
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
            ->addColumn('getStocks', function ($row) {

                if (request('type') == 'inward') {
                    $totalStocks = $row->stocks ? $row->stocks->where('type', '!=', FoodStockEnum::IN_WARD)->sum('stock') : 0;
                } elseif (request('type') == 'outward') {
                    $totalStocks = $row->stocks ? $row->stocks->where('type', FoodStockEnum::OUT_WARD)->sum('stock') : 0;
                } else {
                    $totalStocks = $row->stocks ? $row->stocks->sum('stock') : 0;
                }
                return  $totalStocks ?? 0;
            })

            ->addIndexColumn()

            ->rawColumns([
                'action',
                'getStocks',
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
        return $model->with('stocks')->when(request('start_at'), function ($q) {
            return $q->whereDate('created_at', '>=', Carbon::parse(request()->get('start_at'))->format('Y-m-d'));
        })->when(request('end_at'), function ($q) {
            return $q->whereDate('created_at', '<=', Carbon::parse(request()->get('end_at'))->format('Y-m-d'));
        })->when(request('type') == 'inward', function ($q) {
            return $q->whereHas('inStocks');
        })->when(request('type') == 'outward', function ($q) {
            return $q->whereHas('outStocks');
        })->newQuery();
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
            Column::make('name')->data('name.ar')->title(__('views.name')),
            Column::make('code')->title(__('views.code')),
            Column::make('getStocks')->title(__('views.quantity')),
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
