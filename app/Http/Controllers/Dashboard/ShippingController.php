<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\SettingTranslation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shipping\StoreShipping;

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

    public function updateShipping(StoreShipping $request, $id){
        // dd($request->all());
        try {
            $shippingMethod = Setting::find($id);
            if(!$shippingMethod){
                return session()->flash('error', __('messages.this_item_does_not_exist'));
            }
            DB::beginTransaction();
            $shippingMethod->fill($request->all());
            $shippingMethod->save();

            // get type for redirect to route back 
            $rote_type = explode('_',$shippingMethod->key);

            DB::commit();
            session()->flash('success', __('messages.updateed_successfully'));
            return response()->json([
                'route' => route('admin.settings.editShipping',$rote_type[0])
            ]);

        }catch (\Exception $exception){
            DB::rollback();
            return session()->flash('error', __('messages.general_error'));
        }
    }
}
