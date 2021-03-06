<!-- Step 3 -->
<h6>@lang('site.price')</h6>
<fieldset data-pos="form-file-upload-t-2">
    <div class="row">
        <!-- price -->
        <div class="col-md-6">
            <label for="projectinput1">@lang('site.price')<span class="text-danger">*</span></label>
            <input type="number" id="price" class="form-control border-msg" name="price" value="{{ isset($product)?$product->formatPrice('price'):'' }}">
            <p id="error-price" class="error-content text-danger"></p>
        </div>
        <!-- selling_price -->
        <div class="col-md-6">
            <label for="projectinput1">@lang('site.selling_price')<span class="text-danger">*</span></label>
            <input type="number" id="selling_price" class="form-control border-msg" name="selling_price" value="{{ isset($product)?$product->formatPrice('selling_price'):'' }}">
            <p id="error-selling_price" class="error-content text-danger"></p>
        </div>
       
    </div>

    <div class="row">
        <!-- special_price -->
        <div class="col-md-6">
            <label for="projectinput1">@lang('site.special_price')</label>
            <input type="number" id="special_price" class="form-control border-msg" name="special_price" value="{{ isset($product)?$product->formatPrice('special_price'):'' }}">
            <p id="error-special_price" class="error-content text-danger"></p>
        </div>
        <!-- special_price_type -->
        <div class="col-md-6">
            <label>@lang('site.special_price_type')</label>
            <select class="form-control select2" name="special_price_type">
                    <option value="">@lang('site.choose')</option>
                    <option value="precent" {{ isset($product)&& $product->special_price_type == 'precent'?'selected':'' }}>@lang('site.precent')</option>
                    <option value="fixed" {{ isset($product)&& $product->special_price_type == 'fixed'?'selected':'' }}>@lang('site.fixed')</option>
            </select>
            <p id="error-special_price_type" class="error-content text-danger"></p>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label for="date1">@lang('site.special_price_start') :</label>
                <input type="date" name="special_price_start" class="form-control" id="date1" value="{{isset($product)?$product->special_priceDate('special_price_start'):''}}">
                <p id="error-special_price_start" class="error-content text-danger"></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="date2">@lang('site.special_price_end') :</label>
                <input type="date" name="special_price_end" class="form-control" id="date2" value="{{ isset($product)?$product->special_priceDate('special_price_end'):'' }}">
                <p id="error-special_price_end" class="error-content text-danger"></p>
            </div>
        </div>
    </div>
</fieldset>