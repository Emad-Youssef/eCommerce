<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShippingController extends Controller
{
    public $model_view_folder;

    //default namespace view files

    public function __construct()
    {
        return $this->model_view_folder = 'dashboard.settings.shipping';
    }


    public function editShipping($type)
    {
        // $type = free || local || outer
        if($type === 'free' || $type === 'local' || $type === 'outer'){

            $title = __('site.'.$type.'_shipping');
            $shippingMethod = Setting::where('key', $type.'_shipping_lable')->first();
        }else{
            $title = __('site.free_shipping');
            $shippingMethod = Setting::where('key', 'free_shipping_lable')->first();
        }

        return view($this->model_view_folder.'.edit')->with([
            'shippingMethod' => $shippingMethod,
            'title' => $title,
        ]);

    }
}
