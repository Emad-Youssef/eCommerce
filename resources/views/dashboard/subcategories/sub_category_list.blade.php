@foreach($subcategories as $index =>$subcate)
<option value="{{$subcate->id}}"><span>--- </span>{{$subcate->name}}</option>
@if(count($subcate->subcategory))
@include('dashboard.subcategories.sub_category_list',['subcategories' => $subcate->subcategory])
@endif
@endforeach