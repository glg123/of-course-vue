<?php

namespace App\DataTables;

use App\Models\ContactMethod;
use App\Models\Faq;
use App\Models\User;
use App\Repositories\RoleRepository;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ContactDataTable extends DataTable
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
            ->addColumn('action', function ($row) {
                return view('dashboard.page.contact.btn.btn', compact('row'));
            })
            ->editColumn('name.ar', function ($row) {
                $column = $row->getTranslation('name', 'ar');
                return str_limit($column, 50);
            })
            ->editColumn('name.en', function ($row) {
                $column = $row->getTranslation('name', 'en');
                return str_limit($column, 50);
            })
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
    public function query(ContactMethod $model)
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
            ->setTableId('Contact-table')
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

            Column::make('id')->data('DT_RowIndex')->title('SI NO')->orderable(false),

            Column::make('name')->data('name.ar')->title('طريقة التواصل ( باللغة العربية )')->orderable(false),

            Column::make('name')->data('name.en')->title('طريقة التواصل ( باللغة الإنجليزية )	')->orderable(false),

            Column::make('action')->title(__('translation.action'))
                ->searchable(false)->orderable(false)->width(200)
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Contact_' . date('YmdHis');
    }
}
