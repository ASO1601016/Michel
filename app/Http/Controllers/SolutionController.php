<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Solution;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Storage;



class SolutionController extends Controller
{

    public function showCreateForm()
   {
    $items = \App\Category::get();
    return view('solutions.create')->with('items',$items);
   }

   public function create(Request $request)
   {
    
       // Postモデルのインスタンスを作成する
       $solution = new Solution();
       $solution->solutionUser_id = $request->session()->get('userid');

       $image = $request->file('image');
       $img_path = $image->store('public/solution');
       $read_img_path = str_replace('public/', 'storage/', $img_path);
       $solution->image = $read_img_path;

        //カテゴリ
        $solution->category_id = $request->category_id;
        // タイトル
        $solution->title = $request->title;
        //コンテンツ
        $solution->detail = $request->detail;
        //登録ユーザーからidを取得
        //$solution->user_id = Auth::user()->id;
        // インスタンスの状態をデータベースに書き込む
        for($i = 0; $i < $request->grade; $i++){
           // Postモデルのインスタンスを作成する
            $solution = new Solution();

            $solution->solutionUser_id = $request->session()->get('userid');

            $image = $request->file('image');
            $img_path = $image->store('public/solution');
            $read_img_path = str_replace('public/', 'storage/', $img_path);
            $solution->image = $read_img_path;

            //カテゴリ
            $solution->category_id = $request->category_id;
            // タイトル
            $solution->title = $request->title;
            //コンテンツ
            $solution->detail = $request->detail;
            $solution->save();
       }

       //「投稿する」をクリックしたら投稿情報表示ページへリダイレクト    
       //　結合時トップページにリダイレクトするように   
       return redirect()->action('MichelController@top');

   }
   /**
    * 詳細ページ
    */
   public function detail(Solution $solution)
   {
        //$items = \App\Solution::where('id','30')->first();

        $items = \DB::table('Solutions')
            ->join('Users', 'Solutions.solutionUser_id', '=', 'Users.id')
            ->where('Solutions.id','10')->first();
        
        return view('solutions.detail')->with('title',$items);
             
   }

   public function apply(){
        \App\Solution::where('id', '10')->update(['apply_flag' => '1']);
        return redirect()->action('MichelController@top');
   }
}
