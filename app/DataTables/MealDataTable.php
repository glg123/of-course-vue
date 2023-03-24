<?php

namespace App\DataTables;

use App\Models\Meal;
use App\Models\MealCategory;

use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class MealDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.page.meal.btn.btn')
            ->addIndexColumn()
            ->addColumn('active_text', function ($row) {
                return "<span class='status-active'>" . $row->activeTitle . "</span>";
            })
            ->addColumn('type', function ($row) {

                return $row->meal_plans ? implode(',', $row->meal_plans->pluck('name')->toArray()) : '';
            })
            ->addColumn('days', function ($row) {

                return $row->settings ? implode('<br/>', $row->settings) : '';
            })
            ->editColumn('image', function ($row) {
                return "<img src='" . $row->image_path . "' width='50px' height='50px'>";
            })
            ->rawColumns([
                'action',
                'active_text',
                'image',
                'type',
                'days',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StaffUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Meal $model)
    {
        return $model->with('meal_plans')->when(request('q'), function ($query) {
            return $query->where('name', 'like', '%' . request('q') . '%');
        })->when(request()->has('active') && request('active') != null, function ($query) {
            return $query->where('active', request('active'));
        })->when(request('plan_id'), function ($query) {
            return $query->whereHas('meal_plans', function ($subQuery) {
                return $subQuery->where('meal_plans.id', request('plan_id'));
            });
        })->when(request('day'), function ($query) {
            return $query->whereJsonContains('settings', request('day'));
        })->newQuery();
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

            Column::make('code')->title('الرمز / الكود	'),
            Column::make('image')->title(' الصورة	'),
            Column::make('name')->data('name.ar')->title('اسـم الوجبه (بالعربية)	'),
            Column::make('name')->data('name.en')->title('اسـم الوجبه (بالإنجليزيـة)	'),
            Column::make('active_text')->title('نشط / غير نشط')->searchable(false)->orderable(false),
            Column::make('type')->title('  النــوع'),
            Column::make('days')->title(' الأيام')->width(100)
                ->addClass('text-center'),
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
