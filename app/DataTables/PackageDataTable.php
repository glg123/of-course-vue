<?php

namespace App\DataTables;

use App\Models\Meal;
use App\Models\MealCategory;
use App\Models\Package;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class PackageDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.page.package.btn.btn')
            ->addIndexColumn()
            ->addColumn('active_text', function ($row) {
                return "<span class='status-active'>" . $row->activeTitle . "</span>";
            })
    
            ->editColumn('image', function ($row) {
                return "<img src='" . $row->image_path . "' width='50px' height='50px'>";
            })
            ->rawColumns([
                'action',
                'active_text',
                'image',
           
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StaffUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Package $model)
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

            Column::make('id')->data('DT_RowIndex')->title('SI NO'),
            Column::make('image')->title(' الصورة	'),
            Column::make('name')->data('name.ar')->title('اسـم الحزمه (بالعربية)	'),
            Column::make('name')->data('name.en')->title('اسـم الحزمه (بالإنجليزيـة)	'),
            Column::make('active_text')->title('ااظهار الحزمة	')->searchable(false)->orderable(false),
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
