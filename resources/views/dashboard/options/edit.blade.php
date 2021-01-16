@extends('layouts.admin')
@section('title', $title)
@push('style')
<link rel="stylesheet" href="{{asset('assets/admin/js/select2/css/select2.min.css')}}">

<style>
    .has_error{
        border: 1px solid red !important;
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
                            <li class="breadcrumb-item"><a href="{{route('admin.options.index')}}">{{__('site.options')}}</a>
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
                                    <form id="form-ajax" class="form" data-action="{{ route('admin.options.update',$option->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        {{ method_field('put') }}
                                        @include('dashboard.options._form')
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
@push('script')
<!-- Select2 -->
<script src="{{asset('assets/admin/js/form_ajax.js')}}"></script>
<script src="{{asset('assets/admin/js/select2/js/select2.full.min.js')}}"></script>
<script>
    $('#product-search').select2({
        ajax: {
            url: "{{ route('admin.search.product') }}",
            type: 'GET',
            dataType: 'json',
            data: function (query) {
                var query =  {
                    q: query.term, // search term
                };
                return  query;
            },
            processResults: function (data) {
                return {
                results: $.map(data.products, function (item) {
                    // return console.log(item.name)
                    return {
                        text: item.name,
                        id: item.product_id
                    }
                })
            };
            },
    
        },
    });

    $('#property-search').select2({
        ajax: {
            url: "{{ route('admin.search.property') }}",
            type: 'GET',
            dataType: 'json',
            data: function (query) {
                var query =  {
                    q: query.term, // search term
                };
                return  query;
            },
            processResults: function (data) {
                // return console.log(data.property)
                return {
                results: $.map(data.property, function (item) {
                    // return console.log(item.name)
                    return {
                        text: item.name,
                        id: item.property_id
                    }
                })
            };
            },
    
        },
    });
</script>
@endpush