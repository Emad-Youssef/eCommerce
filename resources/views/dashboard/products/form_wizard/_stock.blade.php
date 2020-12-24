<!-- Step 4 -->
<h6>@lang('site.manage_stock')</h6>
<fieldset data-pos="form-file-upload-t-3">
    <div class="row">
       <!-- sku -->
       <div class="col-md-6">
            <label for="projectinput1">@lang('site.sku')</label>
            <input type="number" id="sku" class="form-control border-msg" name="sku">
            <p id="error-sku" class="error-content text-danger"></p>
        </div>
        <!-- manage_stock -->
        <div class="col-md-6">
            <label>@lang('site.manage_stock')</label>
            <select class="form-control select2" id="manage_stock" name="manage_stock">
                    <option value="0">@lang('site.dont_track')</option>
                    <option value="1">@lang('site.track')</option>
            </select>
            <p id="error-manage_stock" class="error-content text-danger"></p>
        </div>
    </div>
    <div class="row">
       <!-- in_stock -->
       <div class="col-md-6">
            <label for="projectinput1">@lang('site.in_stock')</label>
            <select class="form-control select2" name="in_stock">
                    <option value="1">@lang('site.available')</option>
                    <option value="0">@lang('site.unavailable')</option>
            </select>
            <p id="error-in_stock" class="error-content text-danger"></p>
        </div>
        <!-- qty -->
       <div class="col-md-6" id="qty-div" style="display:none;">
            <label for="projectinput1">@lang('site.qty')<span class="text-danger">*</span></label>
            <input type="number" id="qty" class="form-control border-msg" name="qty">
            <p id="error-qty" class="error-content text-danger"></p>
        </div>
    </div>
</fieldset>

@push('script')
<script>
$(document).on('change','#manage_stock', function () {
    if($(this).val() == 1){
        $('#qty-div').show();
    }else {
        $('#qty-div').hide();
    }
})
</script>
@endpush