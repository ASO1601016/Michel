<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Solution;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->session()->get('userid');
        $fav = Favorite::select('solution_id')
                ->where('user_id', $id)
                ->orderBy('favo_date', 'desc')
                ->get();
        $items = Solution::whereIn('id', $fav)
                ->get();
        return view('favorite.index', ['items'=>$items]);
    }

    public function favoComplete(Request $request)
    {
        $favo = new \App\Favorite;
        
        
        $id = $request->session()->get('userid');
        $solutionId = $request->session()->get('solutionId');
        $count = $favo->where('user_id', $id)
                        ->where('solution_id', $solutionId);
        if($count->count() > 0){
            $count->delete();
        
        }else{
            $date = date("Y/m/d");
            $favo->user_id = $id;
            $favo->solution_id = $solutionId;
            $favo->favo_date = $date;
            $favo->save();
        }

        

        return back();
    }
}
