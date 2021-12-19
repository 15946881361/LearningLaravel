<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Mail;
use Illuminate\Support\Str;
use DB;
use Carbon\Carbon;

class PasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.password.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        //1.验证邮箱
        $this->validate($request,['email'=>'required|email']);
        $email = $request->email;

        //2.查找对应的用户
        $user = User::where('email',$email)->first();

        //3.如果不存在
        if (is_null($user)) {
            session()->flash('danger','邮箱未注册');
            return redirect()->back()->withInput();
        }

        //4.生成token
        $token = hash_hmac('sha256', Str::random(40), config('app.key'));

        //5.信息如数据库
        DB::table('password_resets')->updateOrInsert(['email'=>$email],[
            'email'      => $email,
            'token'      => Hash::make($token),
            'created_at' => new Carbon
        ]);

        //6.将生成的token连接发送给用户
        Mail::send('auth.password.reset_link',compact('token'),function ($message) use ($email) {
            $message->to($email)->subject('忘记密码');
        });

        session()->flash('success', '重置邮件发送成功，请查收');
        return redirect()->back();
    }
}
