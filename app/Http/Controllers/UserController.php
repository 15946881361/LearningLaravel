<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',[
            'except' => ['create', 'show', 'store']
        ]);
    }

    public function create()
    {

        return view('user/create');
    }

    public function show(User $user)
    {

        return view('user/show',compact('user'));
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'name'     => 'required|unique:users|max:50',
            'email'    => 'required|email|unique:users|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name'    => $request->name,
            'email'   => $request->email,
            'password'=> bcrypt($request->password)
        ]);

        Auth::login($user);
        session()->flash('success','欢迎，您将在这里开启一段新的旅程');
        return redirect()->route('user.show',$user);
    }

    public function edit(User $user)
    {
        return view('user/edit',compact('user'));
    }

    public function update(User $user, Request $request)
    {
        $this->validate($request,[
            'name'     =>  'required|max:50',
            'password' =>  'nullable|confirmed|min:6'
        ]);

        $data = array();
        $data['name'] = $request->name;

        if($request->password){
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        session()->flash('success','更新个人资料成功');
        return redirect()->route('user.show',$user->id);
    }
}
