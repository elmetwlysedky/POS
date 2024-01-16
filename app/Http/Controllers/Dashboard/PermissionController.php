<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function add($user_id){

        return view('Dashboard.User.permission',[
            'user'=> User::findOrFail($user_id),
            'permission' => Permission::get(),
            'roles' => Role::get()
        ]);
    }


    public function store(PermissionRequest $request){

        $data = $request->validated();

        $user =User::findOrFail($data['user_id']);
        $permission =$data['permission_id'];
        $role = $data['role_id'];
        $name_permission =Role::wherein('id',$role)->get();
        $user_type = $name_permission->pluck('name');
//        $user_type = 'role and permission';

        $user->role()->attach($role,['user_type'=>$user_type]);
        $user->permission()->attach($permission,['user_type'=>$user_type]);


        session()->flash('success', __('main.added_success'));
        return to_route('user.index');

    }
}
