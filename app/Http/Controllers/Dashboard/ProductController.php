<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Image;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\ProductDatatables;
use App\Http\Requests\Product\StoreProduct;
use App\Http\Requests\Product\UpdateProduct;

class ProductController extends Controller
{
    public $model_view_folder;

    //default namespace view files

    public function __construct()
    {
        return $this->model_view_folder = 'dashboard.products';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(ProductDatatables $product)
    {
        return $product->render($this->model_view_folder.'.index');
    }

    public function create()
    {
        $title = __('site.add_product');
        $data = [];
        $data['brands'] = Brand::active()->select('id')->get();
        $data['tags'] = Tag::select('id')->get();
        $data['categories'] = Category::mainselect()->select('id')->get();
        return view($this->model_view_folder.'.create',compact('title'), $data);
    }
    public function store(StoreProduct $request)
    {
        // dd($request->all());
        try {
           
            DB::beginTransaction();
            
            $product = Product::create($request->except('_token','categories','tags','images'));
           
            if($product){
                $product->categories()->attach($request->categories);
                $product->tags()->attach($request->tags);
                // save images in database
                $this->createImages($product->id,$request->images);
            }

            DB::commit();

            session()->flash('success', __('messages.added_successfully'));
            return response()->json([
                'route' => route('admin.products.index')
            ]);

        }catch (\Exception $exception){
            DB::rollback();
            return session()->flash('error', __('messages.general_error'));
        }

    }

    // edit page
    public function edit($id)
    {
        $product = Product::selection()->find($id);
        if(!$product){
            session()->flash('error', __('messages.this_item_does_not_exist'));
            return back();
        }
        $data = [];
        $data['title'] = __('site.edit_product');
        $data['product'] = $product;
        $data['brands'] = Brand::active()->select('id')->get();
        $data['tags'] = Tag::select('id')->get();
        $data['categories'] = Category::mainselect()->select('id')->get();
        return view($this->model_view_folder.'.edit', $data);
    }

    // update product info in database
    public function update(UpdateProduct $request, $id)
    {
        // dd($request->all());
        $product = Product::find($id);
        if(!$product){
            return session()->flash('error', __('messages.this_item_does_not_exist'));   
        }
        try {
            DB::beginTransaction();
            $product->update($request->except('_token','categories','tags','old_images','images'));
            if($product){
                $product->categories()->sync($request->categories);
                $product->tags()->sync($request->tags);
                // save images in database
                if($request->images)
                 $this->createImages($product->id,$request->images);
            }
            DB::commit();
            session()->flash('success', __('messages.updateed_successfully'));
            return response()->json([
                'route' => route('admin.products.index')
            ]);

        }catch (\Exception $exception){
            DB::rollback();
            return session()->flash('error', __('messages.general_error'));
        }
    }

    // update product info in database
    public function is_active(Request $request, $id)
    {
        $product = Product::find($id);
        if(!$product){
            return session()->flash('error', __('messages.this_item_does_not_exist'));   
        }
        try {
            if($request->is_active == 1 ||  $request->is_active == 0){
                $product->update([
                   'is_active' => $request->is_active
                ]);
                return response()->json([
                    'message' =>  __('messages.updateed_successfully')
                ]);
            }
        }catch (\Exception $exception){
            return session()->flash('error', __('messages.general_error'));
        }
    }

    // delete from database
    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            if(!$product){
                return session()->flash('error', __('messages.this_item_does_not_exist'));   
            }
            $product->delete();
            return response()->json([
                'message' => __('messages.deleted_successfully')
            ]);
            
        } catch (\Exception $ex) {
            return redirect()->route('admin.products')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    // forceDelete from database
    public function forcedelete($id)
    {
        try {
            $product = Product::find($id);
            if(!$product){
                return session()->flash('error', __('messages.this_item_does_not_exist'));   
            }
            $images = $product->images;
            $product->forceDelete();
            // helper function
            foreach($images as $img){
                deleteImage('uploads/products/',$img->img);  
            }
            return response()->json([
                'message' => __('messages.deleted_successfully')
            ]);
            
        } catch (\Exception $ex) {
            return redirect()->route('admin.products')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
    }

    //to save images to folder only
    public function uploadImages(Request $request) {
        $file = $request->file('dzfile');
        $filename = uploadImage('products', $file);
        return response()->json([
            'name' => $filename,
            'org_name' => $file,
        ]);
    }

    //to delete images from folder only
    public function deleteImages(Request $request) {
        if($request->has('fid')){
            $img = Image::find($request->fid);
            $img?$img->delete():'';
        }
        deleteImage('uploads/products/',$request->fileName);
    }

    // insert images in database
    public function createImages($id, $files){
        foreach($files as $file){
            Image::Create([
                'product_id' => $id,
                'img' => $file
            ]);
        }
    }
}