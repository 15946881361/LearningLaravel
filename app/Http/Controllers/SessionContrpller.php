<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionContrpller extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }


    public function store(Request $request)
    {
        $credentials = $this->validate($request,[
            'email'   =>  'required|email|max:255',
            'password'=>  'required'
        ]);

        if (Auth::attempt($credentials,$request->has('remember'))) {
            session()->flash('success', '欢迎回来');
            return redirect()->route('user.show',[Auth::user()]);
        } else {
            session()->flash('danger', '抱歉，您输入的邮箱和密码不匹配');
            return redirect()->back()->withInput();
        }
    }


    public function destroy()
    {
        Auth::logout();
        session()->flash('success','你已成功退出');
        return redirect('login');
    }
}
