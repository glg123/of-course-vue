<?php

namespace App\DataTables;

use App\Models\Clinic;
use App\Models\Faq;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ClinicDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.page.clinic.btn.btn')
            ->addIndexColumn()
            ->editColumn('chosies', function ($row) {
                $chosies = null;
                foreach ($row->choices as $key => $value) {
                    $chosies .= $key .',';
                }
                return $chosies;
            })
            ->editColumn('frequency', function ($row) {
                $frequency = null;
                foreach ($row->frequency as $key => $value) {
                    $frequency .= $key .',';
                }
                return $frequency;
            })
            ->rawColumns([
                'action',
                'chosies',
                'frequency'
          
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StaffUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Clinic $model)
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
            ->setTableId('clinic-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100, 250, -1], [10, 25, 50, 100, 250, 'الكل']],
                'buttons' => [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
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
            Column::make('question')->data('question')->title('السؤال '),
            Column::make('answer_type')->title('نوع الاجابه	 '),
            Column::make('chosies')->title('الخيارات')->searchable(false)->orderable(false),
            Column::make('frequency')->title('التكرار'),
            Column::make('order')->title('رقم الترتيب	')->searchable(false)->orderable(false),
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
        return 'clinic_' . date('YmdHis');
    }
}
