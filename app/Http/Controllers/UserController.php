<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function assessment(Request $request){
        return view('michel.assessment');
    }

    public function assessmentComplete(Request $request){
        $validate_rule = [
            'star' => 'required'
        ];
        $this->validate($request,$validate_rule);

        $solution = new \App\solution;
        $user = new \App\user;

        //達成フラグを1に
        $solutionId = $request->session()->get('solutionId');
        $userid = $request->session()->get('userid');
        $solution->where('id',$solutionId)->update(['comp_flag'=>1]);
        

        //評価計算
        $assessment = $request->star;
        $completeCount = $solution->where('solutionUser_id',$userid)->where('comp_flag',1)->count();
        $status = $user->where('id',$userid)->first()->status;
        
        if($status != 0){ 
            // {dbの評価 * (企画終了数 - 1）+ 新しい評価 } / 企画終了数
            $minus = $completeCount - 1;
            if(($minus - 1) != 0){
                $assessment = ($status * $minus + $assessment) / $completeCount;
            }else{
                $assessment = ($status + $assessment) / $completeCount;
            }
        }
        
        $status = round($assessment + 0.5 * pow(0.1, 2), 2, PHP_ROUND_HALF_DOWN);
        $status = number_format($status,1,null,'');

        // print_r($status);
        $user->where('id',$userid)->update(['status'=>$status]);
        // return view('hello.temp');
        return redirect()->action('MichelController@top');
    }

    //dm投稿
    public function dmSubmit(Request $request){

        $validate_rule = [
            'message' => 'required'
        ];
        
        $this->validate($request,$validate_rule);

        //model読み込み
        $dm = new \App\directMail;
        $message = new \App\message;
        $solution = new \App\solution;
        
        $solutionId = $request->session()->get('solutionId');
        $who = $solution->where('id',$solutionId)->first()->solutionUser_id;
        $myId =  $request->session()->get('userid');
        if($who == $myId){
            $youId = $solution->where('id',$solutionId)->first()->resolutionUser_id;
        }else{
            $youId = $who;
        }
        
        $lastMessageId = $message->max('id');
        if(empty($lastMessageId)){
            $lastMessageId = 1;
        }else{
            $lastMessageId += 1;
        }
        $message->id = $lastMessageId;
        $message->message = $request->message;
        $message->datetime = date("Y-m-d H:i:s");
        $message->save();
        
        $dm->id_Solution = $solutionId;
        $dm->fromUser_id = $myId;
        $dm->toUser_id	 = $youId;
        $dm->message_id = $lastMessageId;
        $dm->save();

        return redirect()->action('UserController@dm');
        
    }

    //dm詳細表示
    public function dm(Request $request){
        $dm = new \App\directMail;
        $message = new \App\message;
        $solution = new \App\solution;
        $user = new \App\user;
        if(isset($request->id)){
            $request->session()->put('solutionId', $request->id);
        }
        
        $solutionId = $request->session()->get('solutionId'); //投稿id
        
        //投稿のユーザー名が自分かどうか判定
        $who = $solution->where('id',$solutionId)->first()->solutionUser_id;
        $myId =  $request->session()->get('userid');
        $flag = false;
        if($who == $myId){
            $youId = $solution->where('id',$solutionId)->first()->resolutionUser_id;
            $flag = true;
        }else{
            $youId = $who;
        }

        
        $myMessageIds = $dm->where('id_Solution',$solutionId)
                            ->where('fromUser_id',$myId)
                            ->where('toUser_id',$youId)
                            ->get('message_id');

        $youMessageIds = $dm->where('id_Solution',$solutionId)
                            ->where('toUser_id',$myId)
                            ->where('fromUser_id',$youId)
                            ->get('message_id');
        
        $myMessage = [];
        $youMessage = [];
        

        //

        

        //
        //自分メッセージ : 0
        //相手メッセージ　: 1
        $count = 0;
        foreach ($myMessageIds as $myMessageId) {
            $msgRow = $message->where('id',$myMessageId->message_id)->first();
            $msg = $msgRow->message;
            $date = $msgRow->datetime;

            
            $myMessage[$count] = array('message' => $msg,'datetime' => $date,'human' => 0);
            $count += 1;
        }
        
        $count = 0;
        foreach ($youMessageIds as $youMessageId) {
            
            $msgRow= $message->where('id',$youMessageId->message_id)->first();
            $msg = $msgRow->message;
            $date = $msgRow->datetime;
           
            $youMessage[$count] = array('message' => $msg,'datetime' => $date,'human' => 1);
            $count += 1;
        }

        $mergeMessage = array_merge_recursive($myMessage,$youMessage);
        array_multisort( array_map( "strtotime", array_column( $mergeMessage, 'datetime' ) ), SORT_ASC, $mergeMessage ) ;
        
        $you = $user->where('id',$youId)->first();
        $img = $you->userImage; 
        if($flag){
            $my = $user->where('id',$myId)->first();
            $topImg = $my->userImage;
            $name = $my->name;    
        }else{
            $topImg = $you->userImage;
            $name = $you->name;
        }
        $title = $solution->where('id',$solutionId)->first()->title;

        if(empty($img)){
            $img = 'storage/icon/me.png';
        }
        return view('michel.dm')->with('mergeMessage',$mergeMessage)
                                ->with('img',$img)->with('topImg',$topImg)
                                ->with('title',$title)->with('name',$name)
                                ->with('flg',$flag); //企画終了ボタン表示判定
    }

    //dm一覧
    public function dmList(Request $request){
        $solution = new \App\solution;
        $dm = new \App\directMail;
        $msg = new \App\message;

        $solutionId = $request->session()->get('solutionId');
        if(!empty($solutionId)){
            $request->session()->forget('solutionId');
        }

        $myId =  $request->session()->get('userid'); //自分のid
        $dmLists = $solution->where('comp_flag',0)->where(function($query) use($myId){$query->where('solutionUser_id',$myId)->orWhere('resolutionUser_id',$myId);})->get();
        
        foreach ($dmLists as $dmList) {
            $lastDm = $dm->where('id_Solution',$dmList->id)->orderBy('id', 'desc')->first();
            if(!empty($lastDm)){
                $last = $msg->where('id',$lastDm->message_id)->first()->message;
                $dmList['lastDm'] = $last;
            }
            
        }
        return view('michel.dmList')->with('dmLists',$dmLists);
    }

    public function edit(Request $request){
        $User = new \App\user;
        $id = $request->session()->get('userid');

        if(isset($request->icon)){
            $icon = $request->file('icon');
            $path = $icon->store('public/icon');
            $dbSavePath = str_replace('public/', 'storage/', $path);
            $dbPath = $User->where('id',$id)->first()->userImage;
            if(!empty($dbPath)){
                Storage::delete($dbPath);
            }
            $User->where('id',$id)->update(['userImage' => $dbSavePath]);
        }

        
        $display = $User->where('id',$id)->first();
        $data = [
            'name'=>$display->name,
            'detail'=>$display->detail,
            'image'=>$display->userImage,
        ];

        return view('michel.edit',$data);
    }

    public function editComplete(Request $request){
        $validate_rule = [
            'name' => 'required'
        ];
        $this->validate($request,$validate_rule);
        
        $User = new \App\user;
        $name = $request->name;
        $intro = $request->intro;
        $id = $request->session()->get('userid');

        $User->where('id',$id)->update(['name'=>$name]);
        $User->where('id',$id)->update(['detail'=>$intro]);
        return redirect()->action('UserController@mypage');
    }

    public function mypage(Request $request){
        $User = new \App\user;
        $School = new \App\school;
        $solution = new \App\solution;
        $category = new \App\category;

        $id = $request->session()->get('userid');
        $display = $User->where('id',$id)->first();
        $schoolName = $School->where('id',$display->id_School)->first()->name;
        
        $solutionComp = $solution->groupBy('solutionUser_id', 'title', 'created_at')->where('solutionUser_id',$id)->where('comp_flag',1);
        
        $recruitmentSolution = $solution->groupBy('solutionUser_id', 'title', 'created_at')->where('solutionUser_id',$id)->where('apply_flag',0)->get();
        $cate = $category->all();

        $completeSolution = $solutionComp->get();
        
        $data = [
            'name'=>$display->name,
            'school'=>$schoolName,
            'sex'=>$display->sex,
            'detail'=>$display->detail,
            'status'=>$display->status,
            'image'=>$display->userImage,
            'comp'=>$solutionComp->count(),
            'complete'=>$completeSolution,
            'recruit'=>$recruitmentSolution,
            'category'=>$cate,
        ];

        return view('michel.mypage',$data);
    }

    // ログインフォーム
    public function login(){
        return view('hello.login');
    }

    public function logout(Request $request){
        $request->session()->forget('userid');
        return redirect('/');
    }

    // 入力された学籍番号とパスワードが正しいかどうか判定
    public function login_check(Request $request){
        
        $validate_rule = [
            'id' => 'required|integer|digits:7|exists:users,id',
            'password' => 'required|string|hash',
        ];
        
        $this->validate($request,$validate_rule);


        $User = new \App\user;
        $password = $request->get('password');
        $id = $request->get('id');
        
        $passObject = $User->where('id',$id)->first('pass');
        if($passObject != null){
            $hashedPassword = $passObject->pass;
        
            if(Hash::check($password,$hashedPassword)){
                $request->session()->put('userid', $id);
                return redirect()->action('MichelController@top');
            }else{
                return redirect()->action('UserController@login');
            }
        }
        return redirect()->action('UserController@login');
    }

    public function complete(Request $request){
        $action = $request->get('action','入力内容の修正');
        $data = $request->session()->get('data');

        if($action === '登録する') {
            
            $User = new \App\user;

            
    
            // var_dump($data);   // データ観測用
    
            $id = $data["id"];
            $password = Hash::make($data["password"]);
            $name = $data["name"];
            $school = $data["school"];
            $grade = $data["grade"];
            $sex = $data["sex"];
            $intro = $data["intro"];
    
            if(isset($data['temp_path'])){
                $temp_path = $data['temp_path'];
                // 画像ファイル名前切り取り
                $filename = str_replace('public/temp/', '', $temp_path);
                // 画像を保存するパスは"public/icon/xxx.jpeg"
                $storage_path = 'public/icon/'.$filename;
                // セッション削除
                $request->session()->forget('data');
                //Storageファサードのmoveメソッドで、第一引数から第二引数へ画像ファイルを移動
                Storage::move($temp_path, $storage_path);
                $read_path = str_replace('public/', 'storage/', $storage_path);
                
            }else{
                $read_path = "";
            }
            
            
            $User->id = $id;
            $User->pass = $password;
            $User->name = $name;
            $User->id_School = $school;
            $User->grade = $grade;
            $User->sex = $sex;
            $User->detail = $intro;
            $User->status = 0;
            $User->userImage = $read_path;
            
            
            $User->save();
            $request->session()->flash('_old_input');
            // return view('hello.login');
            return redirect()->action('UserController@login');
            // return redirect('/');
        } else {
            // 戻る
            $request->session()->flash('_old_input', [
                'number' => $data["id"],
                'nickname' => $data["name"],
                'school' => $data["school"],
                'grade' => $data["grade"],
                'sex' => $data["sex"],
                'intro' => $data["intro"]
            ]);
            return redirect()->action('HelloController@regist');
        }

    }
}
