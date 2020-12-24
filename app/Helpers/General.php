<?php


use App\Models\Category;
// dir style
if(!function_exists('getFolder')){
  function getFolder()
  {
      return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
  }
}


// get parent category for subcategories in datatables
if(!function_exists('getParent')){
    function getParent($id){
      $parent = Category::select(['id','slug'])->find($id);
      return $parent->name;
    }
}

// upload file
if(!function_exists('uploadImage')){
  function uploadImage($folder,$file){
      $file->store('/',$folder);
      $filename = $file->hashName();
      
      return $filename;
  }
}

// delete file 
if(!function_exists('deleteImage')){
  function deleteImage($path,$file){
      if(\File::exists(public_path($path.$file)))
          return \File::delete(public_path($path.$file));
  }

}