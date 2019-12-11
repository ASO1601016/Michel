<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopeSolution;

class solution extends Model
{
    // public $timestamps = false;
    
    // protected $gurded = array('id');
    
    // protected $fillable = array('title', 'image', 'detail');

    // public static $rules = array(
    //     'title' => 'required',
    //     'detail' => 'required'
    // );

    // public function category(){
    //     return $this->belongsTo('App\category');
    // }

    // public function scopeWordSearch($query, $str)
    // {
    //     $data = $query->where(function($query) use($str){
    //                 $query->where('title', 'like', '%' . $str[0] . '%');
    //                 $query->orWhere('detail', 'like', '%' . $str[0] . '%');
    //             })->where(function($query) use($str){
    //                 $n=0;
    //                 foreach ($str as $obj) {
    //                     if($n != 0)
    //                     {
    //                         $query->orwhere('title', 'like', '%' . $obj . '%');
    //                         $query->orwhere('detail', 'like', '%' . $obj . '%');
    //                     }
    //                     $n++;
    //                 }
    //             });
    //     return $data->get();
    // }
}
