<div class="form-body">
    <h4 class="form-section"><i class="ft-home"></i>
        {{ $title }}</h4>
    <div class="row">
        <!-- get languages from translatable -->
        @foreach(config('translatable.locales') as $locale)
        <div class="col-md-6">
            <div class="form-group">
                <label for="error-{{$locale}}name">@lang('site.name_'.$locale)</label>
                <input type="text" id="{{$locale}}name" class="form-control border-msg"
                    name="{{$locale}}[name]"
                    value="{{ isset($property)?@$property->translate($locale)->name:'' }}" required>
                <p id="error-{{$locale}}name" class="error-content text-danger"></p>
            </div>
        </div>
        @endforeach
    </div>
</div>