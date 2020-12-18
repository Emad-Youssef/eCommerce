<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\DataTables\ProductDatatables;
use App\Http\Requests\Product\StoreProduct;

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

    public function index(ProductDatatables $tag)
    {
        return $tag->render($this->model_view_folder.'.index');
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
    //to save images to folder only
    public function saveProductImages(Request $request)
    {
        $path = public_path('assets/images/products/');
        if (!file_exists($path)) {
             mkdir($path, 0777, true);
        }
        $file = $request->file('dzfile');
        $filename = uploadImage('products', $file);
        return response()->json([
        'name' => $filename,
        'original_name' => $file->getClientOriginalName(),
        ]);
    }
    public function deleteProductImages(Request $request)
    {
        echo $_POST['id'] . ' deleted';
        $file = $request->file('dzfile');
        $or = $file->getClientOriginalName();
        $path = public_path('assets/images/products/') . $or;
        if (file_exists($path)) {
        unlink($path);
        }
    }
    public function store(StoreProduct $request)
    {
        // dd($request->all());
        try {
           
            DB::beginTransaction();
            
            $product = Product::create($request->except('_token','categories','tags'));
           
            if($product){
                $product->categories()->attach($request->categories);
                $product->tags()->attach($request->tags);
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


    public function edit($id)
    {
    //get specific categories and its translations
        $data = [];
        $data['product'] = Product::orderBy('id', 'DESC')->find($id);
        $data['brands'] = Brand::active()->select('id')->get();
        $data['tags'] = Tag::select('id')->get();
        $data['categories'] = Category::active()->select('id')->get();
        if (!$data['product'])
        return redirect()->route('admin.products')->with(['error' => 'هذا القسم غير موجود ']);
        return view('admin.products.general.edit', $data);
        }
        public function update($id, MainCategoryRequest $request)
        {
        try {
        //validation
        //update DB
        $product = Product::find($id);
        if (!$product)
        return redirect()->route('admin.products')->with(['error' => 'هذا القسم غير موجود']);
        if (!$request->has('is_active'))
        $request->request->add(['is_active' => 0]);
        else
        $request->request->add(['is_active' => 1]);
        $product->update($request->all());
        //save translations
        //save translations
        $product->name = $request->name;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->save();
        //save product categories
        ;
        $product->categories()->attach($request->category_id);
        $product->tags()->attach($request->tags);
        return redirect()->route('admin.products')->with(['success' => 'تم ألتحديث بنجاح']);
        } catch (\Exception $ex) {
        return redirect()->route('admin.products')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
        }
        public function destroy($id)
        {
        try {
        //get specific categories and its translations
        $products = Product::orderBy('id', 'DESC')->find($id);
        if (!$products)
        return redirect()->route('admin.products')->with(['error' => 'هذا القسم غير موجود ']);
        $image = Str::after($products->photo, '/assets');
        $image = base_path('public/assets/' . $image);
        unlink($image);
        $products->delete();
        return redirect()->route('admin.products')->with(['success' => 'تم الحذف بنجاح']);
        } catch (\Exception $ex) {
        return redirect()->route('admin.products')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }
        }
        public function createSlug($title, $id = 0)
        {
        $slug = str_replace(' ', '-', $title);
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (!$allSlugs->contains('slug', $slug)) {
        return $slug;
        }
        $i = 1;
        $is_contain = true;
        do {
        $newSlug = $slug . '-' . $i;
        if (!$allSlugs->contains('slug', $newSlug)) {
        $is_contain = false;
        return $newSlug;
        }
        $i++;
        } while ($is_contain);
    }
    protected function getRelatedSlugs($slug, $id = 0)
    {
    return Category::select('slug')->where('slug', 'like', $slug . '%')
    ->where('id', '<>', $id)
    ->get();
    }
    /** End slug functions */
    }