<!-- Step 1 -->
<h6>@lang('site.general_information')</h6>
<fieldset data-pos="steps-uid-0-t-0">
    <!-- slug -->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="error-slug">@lang('site.slug')</label>
                <input type="text" id="slug" class="form-control border-msg " name="slug"
                    value="{{ isset($product)?$product->slug:'' }}">
                <p id="error-slug" class="error-content text-danger"></p>
            </div>
        </div>
    </div>
    <!-- product name -->
    <div class="row">
        @foreach(config('translatable.locales') as $locale)
        <div class="col-md-6">
            <div class="form-group">
                <label for="error-{{$locale}}name">@lang('site.name_'.$locale)</label>
                <input type="text" id="{{$locale}}name" class="form-control border-msg" name="{{$locale}}[name]"
                    value="{{ isset($product)?@$product->translate($locale)->name:'' }}">
                <p id="error-{{$locale}}name" class="error-content text-danger"></p>
            </div>
        </div>
        @endforeach
    </div>
    <!-- product short_description -->
    <div class="row">
        @foreach(config('translatable.locales') as $locale)
        <div class="col-md-6">
            <div class="form-group">
                <label for="error-{{$locale}}short_description">@lang('site.short_description_'.$locale)</label>
                <textarea id="{{$locale}}short_description" class="form-control"
                    name="{{$locale}}[short_description]">{{ isset($product)?@$product->translate($locale)->short_description:'' }}</textarea>
                <p id="error-{{$locale}}short_description" class="error-content text-danger"></p>
            </div>
        </div>
        @endforeach
    </div>
    <!-- product description -->
    <div class="row">
        @foreach(config('translatable.locales') as $locale)
        <div class="col-md-12">
            <div class="form-group">
                <label for="error-{{$locale}}description">@lang('site.description_'.$locale)</label>
                <textarea class="ckeditor"
                    name="{{$locale}}[description]">{{ isset($product)?@$product->translate($locale)->description:'' }}</textarea>
                <p id="error-{{$locale}}description" class="error-content text-danger"></p>
            </div>
        </div>
        @endforeach
    </div>
    
</fieldset>
