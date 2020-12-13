<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\BrandsDatatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\StoreBrand;
use App\Http\Requests\Brand\UpdateBrand;

class BrandController extends Controller
{
    public $model_view_folder;

    //default namespace view files

    public function __construct()
    {
        return $this->model_view_folder = 'dashboard.brands';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BrandsDatatables $brand)
    {
        return $brand->render($this->model_view_folder.'.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('site.brands');
        return view($this->model_view_folder.'.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrand $request)
    {
        // dd($request->all());
        try {
           
            DB::beginTransaction();
           
            $brand = new Brand;
            $brand->fill($request->except('_token','img'));
            if($request->hasFile('img')){
                // save photo if exist
                //helper function
                $brand->img = uploadImage('brands',$request->img);
            }
            $brand->save();
            DB::commit();

            session()->flash('success', __('messages.added_successfully'));
            return response()->json([
                'route' => route('admin.brands.index')
            ]);

        }catch (\Exception $exception){
            DB::rollback();
            return session()->flash('error', __('messages.general_error'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = __('site.edit_brand');
        $brand = Brand::find($id);
        if(!$brand){
            session()->flash('error', __('messages.this_item_does_not_exist'));
            return back();
        }
        return view($this->model_view_folder.'.edit', compact('title','brand'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrand $request, $id)
    {
        // dd($request->all());
        try {

            $brand = Brand::find($id);
            if(!$brand){
                session()->flash('error', __('messages.this_item_does_not_exist'));
                return response()->json([
                    'route' => route('admin.brands.index')
                ]);
            }
            DB::beginTransaction();
            // save old img 
            $brand_img = $brand->img;
            // update brand except -> _token & img
            $brand->update($request->except(['_token', 'img']));
            // check if request has new img & delete old path
            if($request->has('img')){
                //helper function
                deleteImage('uploads/brands/',$brand_img);    
                $brand_img = uploadImage('brands',$request->img);
            }
            $brand->img = $brand_img;
            $brand->save();
            // if all done update in datatbase
            DB::commit();
            session()->flash('success', __('messages.updateed_successfully'));
            return response()->json([
                'route' => route('admin.brands.index')
            ]);

        }catch (\Exception $exception){
            DB::rollback();
            return session()->flash('error', __('messages.general_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $brand = Brand::find($id);
            $brand_img = $brand->img;
            //helper function
            deleteImage('uploads/brands/',$brand_img);   
            $brand->delete();
            
            return response()->json([
                'message' => __('messages.deleted_successfully')
            ]);
        }catch (\Exception $exception){
            return session()->flash('error', __('messages.general_error'));
        }
    }
}
