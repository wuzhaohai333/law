<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Index\SmsComController;

class DraftController extends CommController
{
    //投稿列表
    public function draftList( Request $request){
        $contribute_data = DB::table('law_contribute')->join('law_attorney' ,'law_contribute.attorney_id' , '=','law_attorney.attorney_id' ) -> get();
        return view('admin.draftList',['title'=>'投稿列表','data'=>$contribute_data ]);
    }
}
