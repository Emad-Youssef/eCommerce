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
                    value="{{ isset($category)?@$category->translate($locale)->name:'' }}" required>
                <p id="error-{{$locale}}name" class="error-content text-danger"></p>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="error-slug">@lang('site.slug')</label>
                <input type="text" id="slug" class="form-control border-msg" name="slug" value="{{ isset($category)?$category->slug:'' }}" required>
                <p id="error-slug" class="error-content text-danger"></p>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group mt-1">
                <label for="is_active" class="card-title ml-1">@lang('site.is_active')</label>
                <input type="hidden" name="is_active" value="0">
                @if(isset($category))
                <input type="hidden" name="id" value="{{$category->id}}">
                <input type="checkbox" name="is_active" id="is_active" class="switchery border-msg"
                    data-color="success" value="1" {{ $category->is_active == 1?'checked':''}} />
                @else
                <input type="checkbox" name="is_active" id="is_active" class="switchery border-msg"
                    data-color="success" value="1" checked />
                @endif
                <p id="error-active" class="error-content"></p>
            </div>
        </div>
    </div>
</div>