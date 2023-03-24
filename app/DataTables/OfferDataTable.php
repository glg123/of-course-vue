<?php

namespace App\DataTables;

use App\Models\Copoun;
use App\Models\Faq;
use App\Models\Offer;
use App\Models\User;
use App\Repositories\RoleRepository;
use Carbon\Carbon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class OfferDataTable extends DataTable
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
            ->addColumn('action', 'dashboard.page.offer.btn.btn')
            ->editColumn('start_at', function ($row) {
                return  $row->start_at ? Carbon::parse($row->start_at)->diffForHumans() :$row->start_at ;
            })
            ->editColumn('end_at', function ($row) {
                return $row->end_at ? Carbon::parse($row->end_at)->diffForHumans() :$row->end_at;
            })
            ->addColumn('active_text', function ($row) {
                return "<span class='status-active'>" . $row->activeTitle . "</span>";
            })
            ->addIndexColumn()

            ->rawColumns([
                'action',
                'end_at',
                'start_at',
                'active_text'
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\StaffUser $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Offer $model)
    {
        return $model->with('copoun')->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('Offers-table')
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

            Column::make('copoun.code')->data('copoun.code')->title(__('views.copoun')),
            Column::make('copoun_id')->data('copoun.name.ar')->title(__('views.name_ar')),
            Column::make('copoun_id')->data('copoun.name.en')->title(__('views.name_en')),
            Column::make('start_at')->title(__('views.start_at')),
            Column::make('end_at')->title(__('views.end_at')),
            Column::make('active_text')->title(__('views.status')),
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
        return 'Offers_' . date('YmdHis');
    }
}
