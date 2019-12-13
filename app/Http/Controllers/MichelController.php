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
        $today = date("Y-m-d");
        $myId = $request->session()->get('userid');
        //既に応募している企画
        $userItems = solution::select('solutionUser_id', 'title', 'created_at')
                            ->where('resolutionUser_id', $myId)
                            ->get();

        if($userItems->count() <= 0){
            // 応募している企画がなかったら
            $newItems = Solution::where('solutionUser_id','<>',$myId)
                            ->where('apply_flag',0)
                            ->where('limitDate','>=',$today)
                            ->groupBy('solutionUser_id', 'title', 'created_at')
                            ->orderBy('created_at', 'desc')
                            ->take(6)->get();
            $limitItems = Solution::where('solutionUser_id','<>',$myId)
                            ->where('apply_flag',0)
                            ->whereNotNull('limitDate')
                            ->where('limitDate','>=',$today)
                            ->groupBy('solutionUser_id', 'title', 'created_at')
                            ->orderBy('limitDate', 'asc')
                            ->take(3)->get();
        }else{
            //応募している企画idを配列に入れていく処理
            foreach ($userItems as $item) {
                $submitItems[] = solution::select('id')
                        ->where('solutionUser_id',$item->solutionUser_id)
                        ->where('title',$item->title)
                        ->where('created_at',$item->created_at)
                        ->get();
            }
            

            // newTopicsの企画
            $newItems = Solution::where('solutionUser_id','<>',$myId)
                            ->where('apply_flag',0)
                            ->where('limitDate','>=',$today);
                            //whereNotInで既に応募している企画を出さないようにする処理
                            foreach ($submitItems as $submitItem) {
                                foreach ($submitItem as $ids) {
                                    $newItems = $newItems->whereNotIn('id',$ids);
                                }
                            }
                            $newItems = $newItems->groupBy('solutionUser_id', 'title', 'created_at')
                            ->orderBy('created_at', 'desc')
                            ->take(6)->get();
        
            // 締め切り間近の企画
            $limitItems = Solution::where('solutionUser_id','<>',$myId)
                            ->where('apply_flag',0)
                            ->whereNotNull('limitDate')
                            ->where('limitDate','>=',$today);
                            foreach ($submitItems as $submitItem) {
                                foreach ($submitItem as $ids) {
                                    $limitItems = $limitItems->whereNotIn('id',$ids);
                                }
                            }
                            $limitItems = $limitItems->groupBy('solutionUser_id', 'title', 'created_at')
                            ->orderBy('limitDate', 'asc')
                            ->take(3)->get();
        }

        

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
