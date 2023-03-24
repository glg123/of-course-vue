<?php

namespace App\DataTables;

use App\Models\Feature;
use App\Repositories\RoleRepository;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class FeatureDataTable extends DataTable
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
                return view('dashboard.page.setting.appearance.features.components.btn', compact('row'));
            })
            ->editColumn('name.ar', function ($row) {
                $column = $row->getTranslation('name', 'ar');
                return str_limit($column, 25);
            })
            ->editColumn('name.en', function ($row) {
                $column = $row->getTranslation('name', 'en');
                return str_limit($column, 25);
            })
            ->editColumn('image', function ($row) {
                return "<img src='" . $row->image_path . "' width='40px' height='40px'>";
            })
            ->addIndexColumn()
            ->rawColumns([
                'action',
                'image',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param Feature $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Feature $model)
    {
        return $model->latest('id')->when(request()->filled('search.value'), function ($query) {
            $request = request('search.value');
            $query->where('name->en', 'like', '%' . $request . '%');
            $query->orWhere('name->ar', 'like', '%' . $request . '%');
            $query->orWhere('description->en', 'like', '%' . $request . '%');
            $query->orWhere('description->ar', 'like', '%' . $request . '%');
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
            ->setTableId('Feature-table')
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

            Column::make('id')->data('id')->title('#')->orderable(false),

            Column::make('image')->title(__('translation.image'))->orderable(false),

            Column::make('name')->data('name.ar')->title(__('translation.feature_name_ar'))->orderable(false),

            Column::make('name')->data('name.en')->title(__('translation.feature_name_en'))->orderable(false),

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
        return 'Feature_' . date('YmdHis');
    }
}
