@foreach($subcategories as $index =>$subcate)
<option value="{{$subcate->id}}" {{ isset($category)&&$subcate->id == $category->parent_id?'selected':'' }}>&#160;&#160;&#160;&#160;&#160; -{{$subcate->name}}</option>
@if(count($subcate->subcategories))
@include('dashboard.subcategories.sub_category_list',['subcategories' => $subcate->subcategories])
@endif
@endforeach