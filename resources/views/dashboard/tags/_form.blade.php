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
                    value="{{ isset($tag)?@$tag->translate($locale)->name:'' }}" required>
                <p id="error-{{$locale}}name" class="error-content text-danger"></p>
            </div>
        </div>
        @endforeach
        @if(isset($tag))

            <input type="hidden" name="id" value="{{ $tag->id }}">
        @endif
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="error-slug">@lang('site.slug')</label>
                <input type="text" id="slug" class="form-control border-msg" name="slug" value="{{ isset($tag)?$tag->slug:'' }}" required>
                <p id="error-slug" class="error-content text-danger"></p>
            </div>
        </div>
    </div>
</div>