<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class directMail extends Model
{
    protected $table = 'directMails';
    public $timestamps = false;
    public function solution(){
        return $this->belongsTo('App\Models\solution', 'id_Solution', 'id');
    }
}
