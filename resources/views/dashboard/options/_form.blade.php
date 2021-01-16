
<div class="form-body">
    <h4 class="form-section"><i class="ft-home"></i>
        {{ $title }}</h4>
    <div class="row">
        <!-- get languages from translatable -->
        @foreach(config('translatable.locales') as $locale)
        <div class="col-md-6">
            <div class="form-group">
                <label for="error-{{$locale}}name">@lang('site.name_'.$locale)<span class="text-danger">*</span></label>
                <input type="text" id="{{$locale}}name" class="form-control border-msg" name="{{$locale}}[name]"
                    value="{{ isset($option)?@$option->translate($locale)->name:'' }}" required>
                <p id="error-{{$locale}}name" class="error-content text-danger"></p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>@lang('site.products')<span class="text-danger">*</span></label>
            <div class="form-group select-search">
                <select id="product-search" class="form-control select2" style="width: 100%;" name="product_id" required>
                    @if(!isset($option))
                    <option value="" selected>@lang('site.choose')</option>
                    @else
                    <option value="{{$option->product_id}}" selected>{{ option_product($option->product_id) }}</option>
                    @endif
                </select>
            </div>
            <p id="error-product_id" class="error-content text-danger"></p>
        </div>

        <div class="col-md-6">
            <label>@lang('site.properties')<span class="text-danger">*</span></label>
            <div class="form-group select-search">
                <select id="property-search" class="form-control select2" style="width: 100%;" name="property_id" required>
                    @if(!isset($option))
                    <option value="" selected>@lang('site.choose')</option>
                    @else
                    <option value="{{$option->property_id}}" selected>{{ option_property($option->property_id) }}</option>
                    @endif
                </select>
            </div>
            <p id="error-property_id" class="error-content text-danger"></p>
        </div>
    </div>

    <div class="row">
        <!-- price -->
        <div class="col-md-6">
            <label for="projectinput1">@lang('site.price')</label>
            <input type="number" id="price" class="form-control border-msg" name="price" value="{{ isset($option)?$option->price:'' }}">
            <p id="error-price" class="error-content text-danger"></p>
        </div>
    </div>

</div>