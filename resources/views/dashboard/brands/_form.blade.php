<div class="form-body">
    <h4 class="form-section"><i class="ft-home"></i>
        {{ $title }}</h4>

    <div class="row">
        <div class="col-md-6">
            <fieldset class="form-group">
                <div class="custom-file">
                <input type="file" class="custom-file-input image" id="inputGroupFile01 img" name="img">
                <label class="custom-file-label" for="inputGroupFile01">@lang('site.img')</label>
                </div>
            </fieldset>
            <p id="error-img" class="error-content text-danger"></p>
            <div class="form-group">
                <img src="{{ isset($brand)?$brand->img:''}}" style="width: 100px" class="img-thumbnail image-preview" alt="">
            </div>
        </div>
    </div>
    <div class="row">
        <!-- get languages from translatable -->
        @foreach(config('translatable.locales') as $locale)
        <div class="col-md-6">
            <div class="form-group">
                <label for="error-{{$locale}}name">@lang('site.name_'.$locale)</label>
                <input type="text" id="{{$locale}}name" class="form-control border-msg"
                    name="{{$locale}}[name]"
                    value="{{ isset($brand)?@$brand->translate($locale)->name:'' }}" >
                <p id="error-{{$locale}}name" class="error-content text-danger"></p>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group mt-1">
                <label for="is_active" class="card-title ml-1">@lang('site.is_active')</label>
                <input type="hidden" name="is_active" value="0">
                @if(isset($brand))
                <!-- send id for validate unique slug -->
                <input type="hidden" name="id" value="{{$brand->id}}">
                <input type="checkbox" name="is_active" id="is_active" class="switchery border-msg"
                    data-color="success" value="1" {{ $brand->is_active == 1?'checked':''}} />
                @else
                <input type="checkbox" name="is_active" id="is_active" class="switchery border-msg"
                    data-color="success" value="1" checked />
                @endif
                <p id="error-active" class="error-content"></p>
            </div>
        </div>
    </div>
</div>