<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ProductTranslation extends Model
{
    protected $fillable = ['name','short_description','description'];
    
    public function getCreatedAtAttribute($val){
        return Carbon::parse($val)->diffForHumans();
    }
}
