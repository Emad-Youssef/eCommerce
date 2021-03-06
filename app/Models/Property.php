<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Property extends Model implements TranslatableContract
{
    use Translatable;
    
    protected $with = ['translations'];

    public $translatedAttributes = ['name'];

    public function options(){
        return $this->hasMany('App\Models\Option', 'property_id');
    }
}
