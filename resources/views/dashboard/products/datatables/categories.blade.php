<!-- pro_categories DatatableHelpers -->
@foreach(pro_categories($product_id) as $cate)
    <button class="btn btn-info btn-sm btn-block">{{ $cate->name }}</button>
@endforeach