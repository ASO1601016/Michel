<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\solution;
use App\category;
use App\user;
use Illuminate\Support\Facades\Storage;

class MichelController extends Controller
{
    // public function top(){

    //     return view('michel.top');
    // }

    public function top(Request $request)
    {
        $myId = $request->session()->get('userid');
        $newItems = Solution::where('solutionUser_id','<>',$myId)
                            ->where('apply_flag',0)
                            ->groupBy('solutionUser_id', 'title', 'created_at')
                            ->orderBy('created_at', 'desc')
                            ->take(6)->get();
        $limitItems = Solution::where('solutionUser_id','<>',$myId)
                            ->where('apply_flag',0)
                            ->whereNotNull('limitDate')
                            ->groupBy('solutionUser_id', 'title', 'created_at')
                            ->orderBy('created_at', 'desc')
                            ->take(3)->get();
        $categories = category::all();
        if($newItems->count() > 0 && $limitItems->count() > 0){
            return view('solutions.index',['newItems' => $newItems, 'limitItems' => $limitItems, 'categories' => $categories]);
        }else if($newItems->count() > 0){
            return view('solutions.index',['newItems' => $newItems, 'categories' => $categories]);
        }else if($limitItems->count() > 0){
            return view('solutions.index',['limitItems' => $limitItems, 'categories' => $categories]);
        }else{
            return view('solutions.index',['categories' => $categories]);
        }
        
    }


    public function submit(){
        return view('michel.submit');
    }
    
}
