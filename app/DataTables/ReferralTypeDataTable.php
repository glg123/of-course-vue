<?php

namespace App\DataTables;

use App\Models\Referral;
use App\Models\ReferralUser;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ReferralTypeDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.page.referral.type.btn.btn')
//
            ->addIndexColumn()
            ->editColumn('active', function ($row) {
                $status=$row->active==1?'checked':'';
                return '   <div class=" form-switch form-switch-md text-center">
                   <input '.$status.' class="form-check-input" type="checkbox" id="SwitchCheckSizemd">
                                                            </div>';
            })

            ->rawColumns([
                'action',
                'active',
                'userName',
                'userPhone',
                'referralName',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StaffUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Referral $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('Referral-table')
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

            Column::make('id')->data('reference_id')->title('#'),
            Column::make('name')->data('name.en')->title(__('views.name'))->searchable(false)->orderable(false),
            Column::make('additional_days')->title(__('views.additional_days'))->searchable(false)->orderable(false),
            Column::make('bonus')->title(__('views.bonus'))->searchable(false)->orderable(false),
            Column::make('active')->title(__('views.status'))->searchable(false)->orderable(false),
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
        return 'ReferralUser_' . date('YmdHis');
    }
}
