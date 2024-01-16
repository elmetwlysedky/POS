<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

    public function index(){

        return view('Dashboard.User.index',
            [ 'users'=> User::latest()->where('id','<>',auth()->id())->paginate(10),
        ]);
    }



    public function create()
    {

        return view('Dashboard.User.create',);

    }


    public function store(UserRequest $request)
    {
        $data = $request->validated();

        $data['password'] =Hash::make($request->password);
        $user = User::create($data);
        session()->flash('success', __('main.added_success'));
        return to_route('user.index');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        return view('Dashboard.User.edit',[
            'user'=>User:: findOrFail($id)]);
    }


    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->except(['password']);
        if($request['password'] != null){
            $data['password'] =Hash::make($request->password);
        }
        $user->update($data);
        session()->flash('success', __('main.edited_success'));
        return to_route('user.index');
    }

    public function destroy($id)
    {
        User::destroy($id);
        session()->flash('delete', __('main.deleted_success'));
        return redirect()->back();
    }
}
