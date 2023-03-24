<?php

namespace App\DataTables;

use App\Models\User;
use App\Repositories\RoleRepository;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CelebrityUsersDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.page.user.celebrity.btn.btn')
            ->addColumn('active_text', function ($row) {
                return "<span class='status-active'>" . $row->activeTitle . "</span>";
            })->editColumn('role', function ($row) {
                return  $row->roles->first()->name;
            })
            ->addIndexColumn()

            ->rawColumns([
                'action',
                'active_text',
                'role',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StaffUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->when(request()->has('q'), function ($query) {
            return $query->where('first_name', 'like', '%' . request('q') . '%')->orWhere(
                'phone',
                'like',
                '%' . request('q') . '%'
            );
        })->when(request()->boolean('trashed') === true, function ($query) {
            $query->onlyTrashed();
        })->role((new RoleRepository)->roleCelebrity())->newQuery();
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
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            Column::make('id')->data('DT_RowIndex')->title('SI NO'),
            Column::make('first_name')->data('first_name.en')->title('أسم الموظف'),
            Column::make('phone')->data('phone')->title('رقم الجوال'),
            Column::make('active_text')->title('نشط / غير نشط')->searchable(false)->orderable(false),
            Column::make('employee_code')->data('employee_code')->title('كود ألاحاله'),
            Column::make('role')->title('نوع المستخدم')->searchable(false)->orderable(false),
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
