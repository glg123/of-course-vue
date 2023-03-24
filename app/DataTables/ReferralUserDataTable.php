<?php

namespace App\DataTables;

use App\Models\Location;
use App\Models\ReferralUser;
use App\Models\User;
use App\Repositories\RoleRepository;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ReferralUserDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.page.referral.user.btn.btn')
            ->addColumn('userName', function ($row) {
                return $row->user ? $row->user->first_name . ' '.$row->user->last_name : '' ;
            })
            ->addColumn('userPhone', function ($row) {
                return $row->user ? $row->user->phone : '' ;
            })
            ->addColumn('referralName', function ($row) {
                return $row->referral ? $row->referral->name : '' ;
            })
            ->addIndexColumn()

            ->rawColumns([
                'action',
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
    public function query(ReferralUser $model)
    {
        return $model->with('user','referral')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('ReferralUser-table')
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
            Column::make('userName')->title(__('views.user_name'))->searchable(false)->orderable(false),
            Column::make('referralName')->title(__('views.referralName'))->searchable(false)->orderable(false),
            Column::make('userPhone')->title(__('views.mobile'))->searchable(false)->orderable(false),
            Column::make('code')->data('code')->title(__('views.code_referral')),
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
