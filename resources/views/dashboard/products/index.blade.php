@extends('layouts.admin')
@section('title', __('site.products'))
@push('head')
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/css/tables/datatable/jquery.dataTables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/admin/vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
@endpush
@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">@lang('site.show_products')</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('site.homepage')}}</a>
                                </li>
                                <li class="breadcrumb-item active">@lang('site.products')
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
            <section id="dom">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="heading-elements-toggle"><i
                                        class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    @include('dashboard.includes.alerts.success')
                                    @include('dashboard.includes.alerts.error')
                                    <div class="table table-responsive">
                                        {!! $dataTable->table([
                                              'class' => 'table table-striped table-bordered table-sm table-hover',
                                          ], true) !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
                
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{asset('assets/admin/vendors/js/tables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/admin/vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>
    {!! $dataTable->scripts() !!}
    <script src="{{asset('assets/admin/js/jquery-confirm/jquery.confirm.min.js')}}"></script>
    <script src="{{asset('assets/admin/js/form_ajax.js')}}"></script>
@endpush
