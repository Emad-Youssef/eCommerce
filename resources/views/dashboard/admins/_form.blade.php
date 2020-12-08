<div class="form-body">
    <h4 class="form-section"><i class="ft-home"></i>
        {{ $title }}</h4>
    <div class="row">
        <!-- get languages from translatable -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="projectinput1">@lang('site.name')</label>
                <input type="text" id="name" class="form-control border-msg" name="name" >
                <p id="error-name" class="error-content text-danger"></p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="projectinput1">@lang('site.email')</label>
                <input type="email" id="email" class="form-control border-msg" name="email">
                <p id="error-email" class="error-content text-danger"></p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label class=" label-control" for="password">@lang('site.password')</label>
            <input type="text" id="password" class="form-control border-msg" name="password">
            <p id="error-password" class="error-content text-danger"></p>

        </div>
        <div class="col-md-6">
            <label class=" label-control" for="password_confirmation">@lang('site.password_confirmation')</label>
            <input type="text" id="password_confirmation" class="form-control border-msg" name="password_confirmation">

        </div>

    </div>
</div>