@extends('layouts.admin')
@section('title', $title)
@push('style')
    <style>
        .has_error{
            border: 1px solid red !important;
        }
        #arvalue {
            direction: rtl;
        }
    </style>
@endpush
@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title">{{$title}}</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('site.homepage')}}</a>
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
                                <h4 class="card-title" id="basic-layout-form">{{__('site.edit')}} </h4>
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
                                    <form id="form-ajax" class="form" data-action="{{ route('admin.settings.updateShipping',$shippingMethod->id ) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i>{{__('site.edit')}} -
                                                {{ $title }}</h4>
                                            <div class="row">
                                                <!-- get languages from translatable -->
                                                @foreach(config('translatable.locales') as $locale)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('site.name_'.$locale)</label>
                                                        <p id="error-{{$locale}}value" class="error-content text-danger"></p>
                                                        <input type="text" value="{{ $shippingMethod->translate($locale)->value }}"
                                                            id="{{$locale}}value" class="form-control border-msg" name="{{$locale}}[value]" required>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1">@lang('site.value')</label>
                                                        <p id="error-plain_value" class="error-content text-danger"></p>
                                                        <input type="number" value="{{ $shippingMethod->plain_value }}"
                                                            id="plain_value" class="form-control border-msg" name="plain_value">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                onclick="history.back();">
                                                <i class="ft-x"></i> @lang('site.retreat')
                                            </button>
                                            <button type="submit" disabled="true" class="btn btn-primary mr-1">
                                                <i class="la la-check-square-o"></i> @lang('site.save')
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
<script src="{{asset('assets/admin/js/form_ajax.js')}}"></script>
@endpush
