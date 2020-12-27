<?php


use App\Models\Product;
use App\Models\Category;


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