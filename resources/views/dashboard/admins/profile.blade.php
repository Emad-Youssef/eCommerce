@extends('layouts.admin')
@section('title', __('site.edit_profile'))
@push('style')
<style>
.has_error {
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
                <h3 class="content-header-title">@lang('site.edit_profile')</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">{{__('site.homepage')}}</a>
                            </li>
                            <li class="breadcrumb-item active">@lang('site.edit_profile')
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

                                    <form id="form-ajax" data-action="{{ route('admin.profile_update') }}" method="post" class="form form-horizontal form-bordered">
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-user"></i>@lang('site.personal_info')</h4>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput1">@lang('site.name')</label>
                                                <div class="col-md-9">
                                                    <p id="error-name" class="error-content text-danger"></p>
                                                    <input type="text" id="projectinput1 name" class="form-control border-msg"
                                                    value="{{ $admin->name }}" name="name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput3">@lang('site.email')</label>
                                                <div class="col-md-9">
                                                <p id="error-email" class="error-content text-danger"></p>
                                                    <input type="text" id="projectinput3 emal" class="form-control border-msg"
                                                       value="{{ $admin->email }}" name="email" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput3">@lang('site.password')</label>
                                                <div class="col-md-9">
                                                <p id="error-password" class="error-content text-danger"></p>
                                                    <input type="text" id="projectinput3 password" class="form-control border-msg"
                                                        name="password">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="projectinput3">@lang('site.password_confirmation')</label>
                                                <div class="col-md-9">
                                                    <input type="text" id="projectinput3" class="form-control border-msg"
                                                        name="password_confirmation">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                onclick="history.back();">
                                                <i class="ft-x"></i> @lang('site.retreat')
                                            </button>
                                            <button type="submit" class="btn btn-primary mr-1">
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