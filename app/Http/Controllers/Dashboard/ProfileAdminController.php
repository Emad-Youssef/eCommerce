<?php

namespace App\Http\Controllers\Dashboard;

use Exception;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateProfileAdmin;

class ProfileAdminController extends Controller
{
    public $model_view_folder;

    //default namespace view files

    public function __construct()
    {
        return $this->model_view_folder = 'dashboard.admins';
    }

    public function index()
    {
        $id= auth('admin')->user()->id;
        $admin = Admin::find($id);
        return view($this->model_view_folder.'.profile', compact('admin'));
    }

    public function update(UpdateProfileAdmin $request){
        // dd($request->all());
        try {
            $id= auth('admin')->user()->id;
            $admin = Admin::find($id);
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            session()->flash('success', __('messages.updateed_successfully'));
            return response()->json([
                'route' => route('admin.profile')
            ]);

        }catch (\Exception $exception){
            return session()->flash('error', __('messages.general_error'));
        }
    }
}
