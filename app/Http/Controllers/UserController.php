<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {

        return view('user/create');
    }

    public function show(User $user)
    {
        return view('user/show',compact('user'));
    }

    public function store()
    {
        //
    }
}
