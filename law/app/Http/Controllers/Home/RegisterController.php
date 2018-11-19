<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    #律师注册界面
    public function register(){

        return view('home.register');
    }
}
