<?php

namespace App\DataTables;

use App\PropertyDatatable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use App\Models\PropertyTranslation;
use Illuminate\Support\Facades\App;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PropertyDatatables extends DataTable
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
            ->addColumn('action', 'dashboard.properties.datatables.action')
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\PropertyDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $properties = PropertyTranslation::join('properties', 'property_translations.property_id', '=', 'properties.id')
        ->select(['properties.*', 'property_translations.*'])
        ->where('property_translations.locale', App::getLocale());

        return $this->applyScopes($properties);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('propertydatatables-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Blfrtip')
                    ->orderBy(0)
                    ->buttons(
                        Button::make(['className'=>'btn btn-primary btn-sm','text' => '<i class="fa fa-plus"></i> '. trans('site.create'),'action' =>
                       " function() {
                            window.location.href = '".\URL::current()."/create';
                        }"]),
                        Button::make(['extend' => 'print','className'=>'btn btn-info btn-sm','text' => '<i class="fa fa-print"></i> ' . trans('site.print')]),
                        Button::make(['extend' => 'reset','className'=>'btn btn-warning btn-sm','text' => '<i class="fa fa-undo"></i> ' . trans('site.reset')]),
                        Button::make(['extend' => 'reload','className'=>'btn btn-success btn-sm','text' => '<i class="fa fa-refresh"></i> ' . trans('site.reload')])
                    )
                    ->parameters([
                        'initComplete' => "function () {
                                            this.api().columns([]).every(function () {
                                                var column = this;
                                                var input = document.createElement(\"input\");
                                                input.style.width = '150px';
                                                $(input).appendTo($(column.footer()).empty())
                                                .on('keyup', function () {
                                                    column.search($(this).val(), false, false, true).draw();
                                                });
                                            });
                                        }",
                        'language' => [
                            // 'url' => route('dashboard.lang')
                            "sProcessing"       =>     trans('site.sProcessing'),
                            "sLengthMenu"       =>     trans('site.sLengthMenu'),
                            "sZeroRecords"      =>     trans('site.sZeroRecords'),
                            "sEmptyTable"       =>     trans('site.sEmptyTable'),
                            "sInfo"             =>     trans('site.sInfo'),
                            "sInfoEmpty"        =>     trans('site.sInfoEmpty'),
                            "sInfoFiltered"     =>     trans('site.sInfoFiltered'),
                            "sInfoPostFix"      =>     trans('site.sInfoPostFix'),
                            "sSearch"           =>     trans('site.sSearch'),
                            "sUrl"              =>     trans('site.sUrl'),
                            "sInfoThousands"    =>     trans('site.sInfoThousands'),
                            "sLoadingRecords"   =>     trans('site.sLoadingRecords'),
                            "oPaginate" =>[
                                "sFirst"    =>   trans('site.sFirst'),
                                "sLast"     =>   trans('site.sLast'),
                                "sNext"     =>   trans('site.sNext'),
                                "sPrevious" =>   trans('site.sPrevious')
                            ],
                            "oAria"=> [
                                "sSortAscending"    =>     trans('site.sSortAscending'),
                                "sSortDescending"   =>     trans('site.sSortDescending')
                            ]
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
            Column::make('name')->title(trans('site.name')),
            Column::computed('action')->title(trans('site.action'))
                  ->exportable(false)
                  ->printable(false)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'PropertyDatatables_' . date('YmdHis');
    }
}
