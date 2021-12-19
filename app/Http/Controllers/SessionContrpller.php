<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionContrpller extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', [
            'only'   =>  ['create']
        ]);
        $this->middleware('throttle:10,10',[
            'only'   => ['store']
        ]);
    }

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
            if (Auth::user()->activated) {
                session()->flash('success', '欢迎回来');
                $fallback = route('user.show',Auth::user());
                return redirect()->intended($fallback);
                //return redirect()->route('user.show',[Auth::user()]);
            }else{
                Auth::logout();
                session()->flash('warning','您的账号未激活，请检查邮箱中的注册邮件进行激活');
                return redirect('/');
            }

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
