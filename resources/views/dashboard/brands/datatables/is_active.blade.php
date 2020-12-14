@if($is_active == 0)
<button class="btn btn-warning btn-sm">{{__('site.unactive')}}</button>

@else
<button class="btn btn-success btn-sm">{{__('site.active')}}</button>
@endif