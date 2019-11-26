<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\solution;
use App\category;
use App\user;
use App\favorite;
use Illuminate\Support\Facades\Storage;



class SolutionController extends Controller
{

    public function showCreateForm()
   {
    $items = \App\category::get();
    return view('solutions.create')->with('items',$items);
   }

   public function create(Request $request)
   {
        
        $validate_rule = [
            'title' => 'required',
            'detail' => 'required',
            'category_id' => 'required',
            'grade' => 'required',
            'limit' => 'required|after:tomorrow-1day',
        ];
        
        $this->validate($request,$validate_rule);

       
        //登録ユーザーからidを取得
        //$solution->user_id = Auth::user()->id;
        // インスタンスの状態をデータベースに書き込む
        for($i = 0; $i < $request->grade; $i++){
           // Postモデルのインスタンスを作成する
            $solution = new Solution();

            $solution->solutionUser_id = $request->session()->get('userid');
            if(isset($request->image)){
                $image = $request->file('image');
                $img_path = $image->store('public/solution');
                $read_img_path = str_replace('public/', 'storage/', $img_path);
                $solution->image = $read_img_path;
            }
            //カテゴリ
            $solution->category_id = $request->category_id;
            // タイトル
            $solution->title = $request->title;
            //コンテンツ
            $solution->detail = $request->detail;
            //締め切り日
            $solution->limitDate = $request->limit;

            $solution->save();
       }

       //「投稿する」をクリックしたら投稿情報表示ページへリダイレクト    
       //　結合時トップページにリダイレクトするように   
       return redirect()->action('MichelController@top');

       //確認用
        // return view('hello.temp');
   }
   /**
    * 詳細ページ
    */
   public function detail(Solution $solution,Request $request)
   {
        $favo = new \App\favorite;
        $myId = $request->session()->get('userid');
        $count = $favo->where('solution_id',$request->id)->where('user_id',$myId)->count();
        $favoBool = false;
        if($count > 0){
            $favoBool = true;
        }

        $titleFind = solution::where('id',$request->id)->first('title');
        $detailFind = solution::where('id',$request->id)->first('detail');
        $dateFind = solution::where('id',$request->id)->first('created_at');
        $favoCount = solution::select('id')->whereIn('title',$titleFind)->whereIn('detail',$detailFind)->whereIn('created_at',$dateFind);
        $favoCount = $favo->whereIn('solution_id',$favoCount)->count();

        //$items = \App\Solution::where('id','30')->first();
        $request->session()->put('solutionId', $request->id);
        $solutionId = $request->id;
        $items = \DB::table('solutions')
            ->join('users', 'solutions.solutionUser_id', '=', 'users.id')
            ->where('solutions.id',$solutionId)->first();
        
        $mySolutionBool = solution::where('id',$solutionId)->where('solutionUser_id',$myId)->exists();
        
        return view('solutions.detail')->with('title',$items)->with('favoBool',$favoBool)->with('favoCount',$favoCount)->with('mySolutionBool',$mySolutionBool);
             
   }

   public function apply(Request $request){
        $solutionId = $request->session()->get('solutionId');
        $myId = $request->session()->get('userid');
        \App\solution::where('id', $solutionId)->update(['apply_flag' => '1','resolutionUser_id'=>$myId]);
        $request->session()->forget('solutionId');
        return redirect()->action('MichelController@top');
   }

   public function searchResult(Request $request)
    {
        
        if(isset($request->category))
        {
            $cate = $request->category;
            $myId = $request->session()->get('userid');
            $items = solution::where('solutionUser_id','<>',$myId)->where('apply_flag',0)->where('category_id', $cate)->get();
            $cateName = category::where('id',$cate)->first()->name;
            if($items->count() > 0){
                return view('solutions.searchResult', ['items' => $items, 'word' => $cateName]);
            }else{
                return view('solutions.searchResult',['word' => $cateName]);
            }
            
        }else{
            $search =  $request->search;
            $myId = $request->session()->get('userid');
            $items = [];
            if(isset($search)){
                $search = mb_convert_kana($search, 's','utf-8');
                $data = preg_split("/[\s]+/", $search);
                $items = solution::where('solutionUser_id','<>',$myId)->where('apply_flag',0)
                                    ->groupBy('solutionUser_id', 'title', 'created_at')
                                    ->wordSearch($data);
                
            }
            if($items->count() > 0){
                return view('solutions.searchResult', ['items' => $items, 'word' => $search]);
            }else{
                return view('solutions.searchResult',['word' => $search]);
            }
        }
    }
}
