<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DraftController extends Controller
{
    //投稿列表
    public function draftList(){
        return view('admin.draftList',['title'=>'投稿列表']);
    }
}
