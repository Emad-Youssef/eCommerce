<?php

use App\Models\Category;

if(!function_exists('getParent')){
    function getParent($id){
      $parent = Category::select(['id','slug'])->find($id);
      return $parent->name;
    }
}


if(!function_exists('uploadImage')){
  function uploadImage($folder,$file){
      $file->store('/',$folder);
      $filename = $file->hashName();
      
      return $filename;
  }

}