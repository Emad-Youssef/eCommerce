<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Models\ProductTranslation;
use App\Models\PropertyTranslation;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function product(Request $request)
    {
        $products =  ProductTranslation::select(['id','product_id','name'])
        ->where('locale', App::getLocale())
        ->when($request->q, function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->q . '%');

        })->orderBy('id', 'desc')->take(10)->get();
        return response()->json([
            'products' => $products
        ]);  
    }

    public function property(Request $request)
    {
        $property =  PropertyTranslation::select(['id','property_id','name'])
        ->where('locale', App::getLocale())
        ->when($request->q, function ($q) use ($request) {

            return $q->where('name', 'like', '%' . $request->q . '%');

        })->orderBy('id', 'desc')->take(10)->get();
        return response()->json([
            'property' => $property
        ]);  
    }
}
