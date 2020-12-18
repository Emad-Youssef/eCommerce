@extends('layouts.admin')
@section('title', $title)
@push('style')
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/selects/selectize.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/vendors/css/forms/selects/selectize.default.css')}}">
@if(app()->getLocale() == 'ar')
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/plugins/forms/wizard.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/plugins/pickers/daterange/daterange.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css-rtl/plugins/forms/selectize/selectize.css')}}">

@else
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/plugins/forms/wizard.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/plugins/pickers/daterange/daterange.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/plugins/forms/selectize/selectize.css')}}">

@endif
<style>
.has_error {
    border: 1px solid red !important;
}

#arname {
    direction: rtl;
}
</style>
@endpush
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('site.homepage')}}</a>
                            </li>
                            <li class="breadcrumb-item"><a
                                    href="{{route('admin.products.index')}}">{{__('site.products')}}</a>
                            </li>
                            <li class="breadcrumb-item active"> {{$title}}
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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
                                <div class="card-body">
                                    @include('dashboard.includes.alerts.success')
                                    @include('dashboard.includes.alerts.error')
                                    
                                    <form class="number-tab-steps wizard-circle"
                                        data-action="{{ route('admin.products.store') }}" method="POST"
                                        enctype="multipart/form-data" data-previous="{{__('site.previous')}}"
                                        data-next="{{__('site.next')}}" data-save="{{__('site.save')}}">
                                        @csrf
                                        @include('dashboard.products.form_wizard._translations')
                                        @include('dashboard.products.form_wizard._general_information')
                                        @include('dashboard.products.form_wizard._price')
                                       
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                onclick="history.back();">
                                                <i class="ft-x"></i> @lang('site.retreat')
                                            </button>
                                            <button type="submit" disabled="true" class="btn btn-primary mr-1">
                                                <i class="ft-check"></i> @lang('site.save')
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic form layout section end -->

        </div>
    </div>
</div>

@endsection

@push('form_wizard')

<script src="{{asset('assets/admin/vendors/js/editors/ckeditor/ckeditor.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/admin/vendors/js/extensions/jquery.steps.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/pickers/dateTime/moment-with-locales.min.js')}}" type="text/javascript">
</script>
<script src="{{asset('assets/admin/vendors/js/pickers/daterange/daterangepicker.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/vendors/js/forms/select/selectize.min.js')}}" type="text/javascript"></script>
@endpush

@push('script')


<script src="{{asset('assets/admin/js/form_ajax.js')}}"></script>
<script src="{{asset('assets/admin/js/scripts/forms/select/form-selectize.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/admin/js/scripts/editors/editor-ckeditor.js')}}" type="text/javascript"></script>


@endpush