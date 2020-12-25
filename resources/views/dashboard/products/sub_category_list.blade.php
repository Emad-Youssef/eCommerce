@foreach($subcategories as $index =>$subcate)
<option value="{{$subcate->id}}" {{ isset($product) ?selectRelationship($product->categories,$subcate->id):'' }}>
&#160;&#160;&#160;&#160;&#160; -{{$subcate->name}}</option>
@if(count($subcate->subcategories))
@include('dashboard.subcategories.sub_category_list',['subcategories' => $subcate->subcategories])
@endif
@endforeach