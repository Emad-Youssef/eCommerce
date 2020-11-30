@extends('layouts.admin')
@section('title', $title)
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
                                    <form id="form-ajax" class="form" data-action="" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <h4 class="form-section"><i class="ft-home"></i>{{__('site.edit')}} -
                                                {{ $title }}</h4>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> اسم اللغة </label>
                                                        <p id="error-name" class="error-content"></p>
                                                        <input type="text" value="{{isset($edit)?$lang->name:''}}"
                                                            id="name" class="form-control border-msg" name="name">
                                                        <span class="text-danger"> </span>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="projectinput1"> الاختصار </label>
                                                        <p id="error-abbr" class="error-content"></p>
                                                        <input type="text" value="{{isset($edit)?$lang->abbr:''}}"
                                                            id="abbr" class="form-control border-msg" name="abbr">
                                                        <span class="text-danger"> </span>
                                                    </div>
                                                    @error('abbr')
                                                    {{$message}}
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mt-1">

                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" checked
                                                                name="customCheck" id="customCheck2">
                                                            <label class="custom-control-label"
                                                                for="customCheck2">Custom</label>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions">
                                            <button type="button" class="btn btn-warning mr-1"
                                                onclick="history.back();">
                                                <i class="ft-x"></i> تراجع
                                            </button>
                                            <button type="submit" disabled="disabled" class="btn btn-primary mr-1">
                                                <i class="la la-check-square-o"></i> حفظ
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