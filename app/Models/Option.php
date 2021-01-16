<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Option extends Model implements TranslatableContract
{
    use Translatable;
    
    protected $with = ['translations'];

    public $translatedAttributes = ['name'];
    protected $fillable = ['property_id', 'product_id','price'];

    public function property()
    {
        return $this->belongsTo('App\Models\Property','property_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id');
    }

    
    public function getPriceAttribute($value)
    {
        return str_replace(',', '', number_format($value));
    }
}
