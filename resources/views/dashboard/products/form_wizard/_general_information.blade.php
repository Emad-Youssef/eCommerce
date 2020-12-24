<!-- Step 2 -->
<h6>@lang('site.general_information')</h6>
<fieldset data-pos="form-file-upload-t-1">
<!-- slug & brand-->
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="error-slug">@lang('site.slug')<span class="text-danger">*</span></label>
                <input type="text" id="slug" class="form-control border-msg " name="slug"
                    value="{{ isset($product)?$product->slug:'' }}">
                <p id="error-slug" class="error-content text-danger"></p>
            </div>
        </div>
        <!-- brand -->
        <div class="col-md-6">
            <label><i class="la la-trademark"></i>@lang('site.brands')</label>
            <select class="form-control" name="brand_id">
                <option value="">@lang('site.choose')</option>
                @foreach($brands as $brand)
                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                @endforeach
            </select>
            <p id="error-brand_id" class="error-content text-danger"></p>
        </div>
       
    </div>
    <!-- categories &  tags-->
    <div class="row">
     <!-- categories -->
        <div class="col-md-6" id="categories">
            <label><i class="la la-folder-open-o"></i>@lang('site.main_categories')<span class="text-danger">*</span></label>
            
            <select class="selectize-multiple required categories" name="categories[]" multiple>
                <option value="">@lang('site.choose')</option>
                @foreach($categories as $cate)
                <option value="{{$cate->id}}" {{ isset($category)&&$cate->id == $category->parent_id?'selected':'' }}>
               {{$cate->name}}</option>
                    @if(count($cate->subcategories))
                        @foreach($cate->subcategories as $index =>$subcate)
                            <option value="{{$subcate->id}}" {{ isset($category)&&$subcate->id == $category->parent_id?'selected':'' }} style="font-weight: 600;">
                            &#160;&#160;-{{$subcate->name}}</option>
                            @if(count($subcate->subcategories))
                                @include('dashboard.products.sub_category_list',['subcategories' => $subcate->subcategories])
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </select>
            <p id="error-categories" class="error-content text-danger"></p>
        </div>
        <!-- tags -->
        <div class="col-md-6">
            <label><i class="la la-tags"></i>@lang('site.tags')</label>
            
            <select class="selectize-multiple" name="tags[]" multiple>
                <option value="">@lang('site.choose')</option>
                @foreach($tags as $tag)
                <option value="{{$tag->id}}" >
            {{$tag->name}}</option>
                @endforeach
            </select>
            <p id="error-tags" class="error-content text-danger"></p>
        </div>
        <div class="col-md-6">
            <div class="form-group mt-1">
                <label for="is_active" class="card-title ml-1"></label>
                <input type="hidden" name="is_active" value="0">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" value="1" name="is_active" id="customCheck1" checked>
                    <label class="custom-control-label" for="customCheck1">@lang('site.is_active')</label>
                </div>
                <p id="error-is_active" class="error-content text-danger"></p>
            </div>
        </div>
    </div>
</fieldset>