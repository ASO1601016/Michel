<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MichelController extends Controller
{
    public function top(){

        return view('michel.top');
    }

    public function submit(){
        return view('michel.submit');
    }
    // むーくんからもらったやつ
    public function detail(Request $request){
        $solution = new \App\solution;
        $items = $solution->where('id','7')->first();
        return view('michel.detail')->with('title',$items);
   }
}
