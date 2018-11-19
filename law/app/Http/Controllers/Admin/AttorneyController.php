<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttorneyController extends Controller
{
    //律师列表
    public function attorneyList(){
        return view('admin.attorneyList',['title'=>'律师列表']);
    }
    //律师提现记录
    public function attorneyWithdraw(){
        return view('admin.attorneyWithdraw',['title'=>'提现记录']);
    }
}
