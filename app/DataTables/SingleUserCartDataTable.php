<?php

namespace App\DataTables;

use App\Models\Copoun;
use App\Models\Faq;
use App\Models\User;
use App\Models\UserCart;
use App\Repositories\RoleRepository;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class SingleUserCartDataTable extends DataTable
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
            ->editColumn('temporary_discount', function ($row) {
                $status = $row->temporary_discount == 1 ? 'checked' : '';
                return '   <div class=" form-switch form-switch-md text-center">
                   <input ' . $status . ' class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
                                                            </div>';
            })
            ->addIndexColumn()
            ->rawColumns([

                'temporary_discount',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\UserCart $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UserCart $model)
    {

        return $model->where('user_id',$this->id)->with('customer', 'package')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('Cart-table')
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

            Column::make('id')->title(__('#')),
            Column::make('user_id')->data('customer.first_name.' . app()->getLocale())->title(__('views.user_name')),
            Column::make('package_id')->data('package.name.' . app()->getLocale())->title(__('views.packages')),
            Column::make('price')->title(__('views.price')),
            Column::make('temporary_discount')->title(__('views.temporary_discount')),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Cart_' . date('YmdHis');
    }
}
