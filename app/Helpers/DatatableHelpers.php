<?php


use App\Models\Product;
use App\Models\Category;
use App\Models\Property;


// get parent category for subcategories in datatables
if(!function_exists('getParent')){
    function getParent($id){
      $parent = Category::select(['id','slug'])->find($id);
      return $parent->name;
    }
}

// get categories for product in datatables
if(!function_exists('pro_categories')){
  function pro_categories($product_id){
    $categories = Product::select(['id'])->with('categories:id')->find($product_id);
    return $categories->categories;
  }
}

// get product for options in datatables
if(!function_exists('option_product')){
  function option_product($product_id){
    $product = Product::select(['id'])->find($product_id);
    return $product->name;
  }
}

// get property for options in datatables
if(!function_exists('option_property')){
  function option_property($property_id){
    $property = Property::select(['id'])->find($property_id);
    return $property->name;
  }
}