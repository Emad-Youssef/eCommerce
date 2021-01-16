<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Product extends Model
{
    use Translatable, SoftDeletes;
    
    protected $with = ['translations'];

    public $translatedAttributes = ['name','short_description','description'];
    protected $fillable = [
        'brand_id',
        'slug',
        'price',
        'special_price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'selling_price',
        'sku',
        'manage_stock',
        'qty',
        'in_stock',
        'viewed',
        'is_active'
    
    ];

    protected $casts = [
        'manage_stock'  => 'boolean',
        'in_stock'      => 'boolean',
        'is_active'     => 'boolean'
    ];

    protected $dates = [
        'special_price_start',
        'special_price_end',   
        'deleted_at'
    ];

    public function images(){
        return $this->hasMany('App\Models\Image', 'product_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand','brand_id')->withDefault();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category','product_categories');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','product_tags');
    }

    public function options(){
        return $this->hasMany('App\Models\Option', 'product_id');
    }

    public function scopeSelection($q){
      return $q->with(['images:id,product_id,img','categories:id','tags:id']);
    }

    public function special_priceDate($val){
        return $this->$val !== null?$this->$val->format('Y-m-d'):'';
    }

    public function formatPrice($price){
        return str_replace(',', '', number_format($this->$price));
    }

}