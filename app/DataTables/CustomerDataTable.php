<?php

namespace App\DataTables;

use App\Models\User;
use App\Repositories\RoleRepository;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class CustomerDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.page.user.customer.btn.btn')
            ->editColumn('tag_id', function ($row) {
                return  $row->tag ? $row->tag->name : '';
            })
            ->editColumn('area_id', function ($row) {
                return  $row->main_address() ? $row->main_address()->area->name ?? '-' : '';
            })
            ->addColumn('streetName', function ($row) {
                return  $row->main_address() ? $row->main_address()['address']['street_name'] ?? '-' : '';
            })
            ->addColumn('building_no', function ($row) {
                return  $row->main_address() ? $row->main_address()['address']['building_no'] ?? '-' : '';
            })
            ->addIndexColumn()

            ->rawColumns([
                'action',
                'building_no',
                'streetName',
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
        return $model->with('area', 'tag')->when(request()->has('q'), function ($query) {
            $query->where('first_name', 'like', '%' . request('q') . '%');
        })->when(request()->boolean('trashed') === true, function ($query) {
            $query->onlyTrashed();
        })->when(request('tag_id'), function ($query) {
            $query->where('tag_id', request()->get('tag_id'));
        })->when(request('area_id'), function ($query) {
            $query->where('area_id', request()->get('area_id'));
        })->when(request('block_id'), function ($query) {
            $query->where('block_id', request()->get('block_id'));
        })->when(request('type') == 'not_verified', function ($query) {
            $query->whereNull('verified_at');
        })->role('customer')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('staffusers-table')
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

            Column::make('id')->data('DT_RowIndex')->title('SI NO'),
            Column::make('first_name')->data('first_name.en')->title(__('views.first_name')),
            Column::make('tag_id')->title(__('views.categories')),
            Column::make('phone')->data('phone')->title(__('views.mobile')),
            Column::make('area_id')->title(__('views.area')),
            Column::make('streetName')->title(__('views.streetName')),
            Column::make('building_no')->title(__('views.building_no')),
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
        return 'StaffUsers_' . date('YmdHis');
    }
}
