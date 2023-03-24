<?php

namespace App\DataTables;

use App\Models\Meal;
use App\Models\MealCategory;
use App\Models\Package;
use App\Models\PackageVarient;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PackageVarientDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.page.package.varients.btn.btn')
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
    public function query(PackageVarient $model)
    {
        return $model->with('package')->where('package_id',request('package_id'))->newQuery();
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

            Column::make('id')->data('DT_RowIndex')->title('SI NO'),
            Column::make('name')->data('name.ar')->title('اسـم الخطه (بالعربية)	'),
            Column::make('name')->data('name.en')->title('اسـم الخطه (بالإنجليزيـة)	'),
            Column::make('package_id')->data('package.name.ar')->title('الحزمة التابعه لها	'),
            Column::make('days_available')->title('الايام المتاحه'),
            Column::make('price')->title(' السعر'),
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
        return 'Contact_' . date('YmdHis');
    }
}
