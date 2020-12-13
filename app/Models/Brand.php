<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Brand extends Model implements TranslatableContract
{
    use Translatable;
    
    protected $with = ['translations'];

    public $translatedAttributes = ['name'];
    protected $fillable = ['img','is_active'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function getActive(){
        return $this->is_active == 0?__('site.unactive'):__('site.active');
    }

    public function getImgAttribute($val){
        return $val !== null? asset('uploads/brands').'/'. $val: '';
    }
}
