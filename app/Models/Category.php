<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Category extends Model implements TranslatableContract
{
    use Translatable;
    
    protected $with = ['translations'];

    public $translatedAttributes = ['name'];
    protected $fillable = ['parent_id', 'slug','is_active'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function subcategory(){

        return $this->hasMany('App\Models\Category', 'parent_id');

    }

    public function parent() {
        return $this->belongsTo('App\Models\Category', 'parent_id', 'id');
    }


    public function maincategory(){

        return $this->hasMany('App\Models\Category', 'parent_id');

    }

    public function getCreatedAtAttribute($val){
        return Carbon::parse($val)->diffForHumans();
    }

    public function getActive(){
        return $this->is_active == 0?__('site.unactive'):__('site.active');
    }

}
