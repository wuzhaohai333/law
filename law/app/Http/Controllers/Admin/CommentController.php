<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends CommController
{
    //评论列表
    public function commentList(){
        return view('admin.commentList',['title'=>'评论列表']);
    }
}
