<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\DataTables\TagDatatables;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Tag\StoreTag;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tag\UpdateTag;

class TagController extends Controller
{
    public $model_view_folder;

    //default namespace view files

    public function __construct()
    {
        return $this->model_view_folder = 'dashboard.tags';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TagDatatables $tag)
    {
        return $tag->render($this->model_view_folder.'.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('site.add_tag');
        return view($this->model_view_folder.'.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTag $request)
    {
        // dd($request->all());
        try {
           
            DB::beginTransaction();
            Tag::create($request->except('_token'));
            DB::commit();

            session()->flash('success', __('messages.added_successfully'));
            return response()->json([
                'route' => route('admin.tags.index')
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
        $title = __('site.edit_tag');
        $tag = Tag::find($id);
        if(!$tag){
            session()->flash('error', __('messages.this_item_does_not_exist'));
            return back();
        }
        return view($this->model_view_folder.'.edit', compact('title','tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTag $request, $id)
    {
        try {
            $tag = Tag::find($id);
            if(!$tag){
                return session()->flash('error', __('messages.this_item_does_not_exist'));   
            }
            DB::beginTransaction();
            $tag->update($request->except(['_token', 'id']));
            
            DB::commit();
            session()->flash('success', __('messages.updateed_successfully'));
            return response()->json([
                'route' => route('admin.tags.index')
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
            $tag = Tag::find($id);
            $tag->delete();
            return response()->json([
                'message' => __('messages.deleted_successfully')
            ]);
        }catch (\Exception $exception){
            return session()->flash('error', __('messages.general_error'));
        }
    }
}