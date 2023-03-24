<?php

namespace App\DataTables;

use App\Models\Faq;
use App\Models\User;
use App\Repositories\RoleRepository;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class FaqsDataTable extends DataTable
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
                return view('dashboard.page.faq.btn.btn', compact('row'));
            })
            ->addIndexColumn()
            ->addColumn('active_text', function ($row) {
                return "<span class='badge bg-" . labelColor($row->status_key) . "'>{$row->status_name}</span>";
            })
            ->rawColumns([
                'action',
                'active_text'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StaffUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Faq $model)
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
            ->setTableId('Faqs-table')
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

            Column::make('question')->data('question')->title('السؤال')
                ->orderable(false)->width(400),

            Column::make('active_text')->title('نشط / غير نشط')->orderable(false),

            Column::make('show_order')->title('رقم الترتيب')->searchable(false)->orderable(false),

            Column::make('action')->title(__('translation.action'))
                ->searchable(false)->orderable(false)->width(200),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Faqs_' . date('YmdHis');
    }
}
