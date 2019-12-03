<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class HelloController extends Controller{
    public function regist(){
        $School = new \App\school;
        $items = $School->all();
        // $item = DB::select('select * from people');
        // return view('hello.index',['items' => $item]);
        
        // $data = ['message'=>'これはBladeを利用したメッセージです'];
        // return view('hello.index',$data);

        return view('hello.regist',['items' => $items]);
    }

    public function post(Request $request){

        $validate_rule = [
            'number' => 'required|integer|digits:7|unique:users,id',
            'password' => 'required|confirmed|regex:/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i',
            'password_confirmation' => 'required',
            'nickname' => 'required|string',
            'school' => 'required|exists:schools,id',
            'grade' => 'required|between:1,4',
            'sex' => 'in:"未設定","男","女"',
            'intro' => 'string|nullable',
            'icon' => 'image|max:5000'
        ];
        $this->validate($request,$validate_rule);

        // $id 学籍番号
        // $pass_circle パスワード
        // $name ニックネーム
        // $school 学校名
        // $grade 学年
        // $sex 性別
        // $intro 自己紹介

        // $icon アイコン画像のローカルパス
        // $temp_path 保存パス
        // ※store関数：引数のフォルダ内に書き込んだ後にパスを返す
        // $read_temp_path 読込パス
        // ※str_replace関数：第三引数から第一引数を探し、第二引数に置き換える
        // 保存用と読込用のフォルダが異なっているため、
        // 確認画面で画像を表示させる為に表示用パスに変換している

        // $data_db DB保存用
        // $data 画面表示用
        $School = new \App\school;

        $id = $request->number;
        $password = $request->password;
        $pass_circle = str_repeat("●",mb_strlen($password));
        $name = $request->nickname;
        $school_name = $School->where('id', $request->school)->get()[0]->name;
        $school_number = $request->school;
        $grade = $request->grade;
        $sex = $request->sex;

        $data_db = [
            'id'=>$id,
            'password'=>$password,
            'name'=>$name,
            'school'=>$school_number,
            'grade'=>$grade,
            'sex'=>$sex
        ];

        $data = [
            'id'=>$id,
            'pass_circle'=>$pass_circle,
            'name'=>$name,
            'school'=>$school_name,
            'grade'=>$grade,
            'sex'=>$sex
        ];

        if(isset($request->intro)){
            $intro = $request->intro;
        }else{
            $intro = "";
        }

        $data_db += array('intro'=>$intro);
        $data += array('intro'=>$intro);

        if(isset($request->icon)){
            $icon = $request->file('icon');
            $temp_path = $icon->store('public/temp');
            $read_temp_path = str_replace('public/', 'storage/', $temp_path);
            $data_db += array('temp_path'=>$temp_path);
            $data += array('read_temp_path'=>$read_temp_path);
        }

        $request->session()->put('data', $data_db);
        return view('hello.confirm',$data);
    }

    
}