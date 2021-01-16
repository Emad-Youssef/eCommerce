<!-- Step 1 -->
<h6>@lang('site.translations')</h6>
<fieldset data-pos="form-file-upload-t-0">
    <!-- product name -->
    <div class="row">
        @foreach(config('translatable.locales') as $locale)
        <div class="col-md-6">
            <div class="form-group">
                <label for="error-{{$locale}}name">@lang('site.name_'.$locale)<span class="text-danger">*</span></label>
                <input type="text" id="{{$locale}}name" class="form-control border-msg" name="{{$locale}}[name]"
                    value="{{ isset($product)?@$product->translate($locale)->name:'' }}" required>
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
                <label for="error-{{$locale}}description">@lang('site.description_'.$locale)<span class="text-danger">*</span></label>
                <textarea class="ckeditor"
                    name="{{$locale}}[description]" required>{{ isset($product)?@$product->translate($locale)->description:'' }}</textarea>
                <p id="error-{{$locale}}description" class="error-content text-danger"></p>
            </div>
        </div>
        @endforeach
    </div>
    
</fieldset>
