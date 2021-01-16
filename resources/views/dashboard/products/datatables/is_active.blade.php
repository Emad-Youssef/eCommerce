<form class="is_active" data-action="{{ route('admin.products.is_active',$product_id) }}" method="POST">
    @csrf
    @if($is_active == 0)
        <input type="hidden" name="is_active" value="1" />
        <button type="submit" class="btn btn-warning btn-sm" 
            >{{__('site.unactive')}}</button>
    @else
    <input type="hidden" name="is_active" value="0" />
    <button type="submit" class="btn btn-success btn-sm" 
        >{{__('site.active')}}</button>
    @endif
</form>