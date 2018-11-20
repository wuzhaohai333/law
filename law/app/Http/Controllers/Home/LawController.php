<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LawController extends Controller
{
    #找律师页面
    public function findLawyer(){
        return view('home.findLawyer');
    }

    #法律常识
    public function lawKnowledge(){
        return view('home.lawKnowledge');
    }
}
