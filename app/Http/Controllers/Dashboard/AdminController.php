<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\DataTables\AdminDatatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreAdmin;

class AdminController extends Controller
{
    public $model_view_folder;

    //default namespace view files

    public function __construct()
    {
        return $this->model_view_folder = 'dashboard.admins';
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDatatables $admin)
    {
        return $admin->render($this->model_view_folder.'.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = __('site.add_admin');
        return view($this->model_view_folder.'.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdmin $request)
    {
        try {
            $id= auth('admin')->user()->id;
            $admin = Admin::find($id);
            $admin->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            session()->flash('success', __('messages.added_successfully'));
            return response()->json([
                'route' => route('admin.admins.index')
            ]);

        }catch (\Exception $exception){
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
