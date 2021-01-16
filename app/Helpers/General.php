<?php

// dir style
if(!function_exists('getFolder')){
  function getFolder()
  {
      return app()->getLocale() == 'ar' ? 'css-rtl' : 'css';
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

// for edit product form
if(!function_exists('selectRelationship')){
  function selectRelationship($array, $id){
    $relationship_array =  [];
    foreach($array as $rel){
        $relationship_array[] = $rel->id;
    }
    return in_array($id,$relationship_array)?'selected':'' ;
  
  }
}