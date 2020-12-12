<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CategoryTranslation;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\DataTables\SubCategoriesDatatables;
use App\Http\Requests\SubCategory\StoreSubcategory;
use App\Http\Requests\SubCategory\UpdateSubcategory;

class SubCategoryController extends Controller
{
    public $model_view_folder;

    //default namespace view files

    public function __construct()
    {
        return $this->model_view_folder = 'dashboard.subcategories';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SubCategoriesDatatables $category)
    {
        return $category->render($this->model_view_folder.'.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('site.add_subCategory');
        // mainselect scope form model
        $maincategories = Category::mainselect()->get();
        return view($this->model_view_folder.'.create', compact('title','maincategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubcategory $request)
    {
        // dd($request->all());
        try {
           
            DB::beginTransaction();
            Category::create($request->except('_token'));
            DB::commit();

            session()->flash('success', __('messages.added_successfully'));
            return response()->json([
                'route' => route('admin.subCategory.index')
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
        $title = __('site.edit_subCategory');
        // mainselect scope form model
        $maincategories = Category::mainselect()->get();
        $category = Category::whereNotNull('parent_id')->find($id);
        if(!$category){
            session()->flash('error', __('messages.this_item_does_not_exist'));
            return back();
        }
        return view($this->model_view_folder.'.edit', compact('title','category','maincategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubcategory $request, $id)
    {
        try {
            DB::beginTransaction();

            $category = Category::find($id);
            $category->update($request->except(['_token', 'id']));
            
            DB::commit();
            session()->flash('success', __('messages.updateed_successfully'));
            return response()->json([
                'route' => route('admin.subCategory.index')
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
            $category = Category::whereNotNull('parent_id')->find($id);
            $category->delete();
            return response()->json([
                'message' => __('messages.deleted_successfully')
            ]);
        }catch (\Exception $exception){
            return session()->flash('error', __('messages.general_error'));
        }
    }
}

