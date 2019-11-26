<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;

class CustomValidator extends \Illuminate\Validation\Validator
{
  /**
  * ふりがなのバリデーション
  *
  * @param $attribute
  * @param $value
  * @param $parameters
  * @return bool
  */
  public function validateHash($attribute, $value, $parameters)
  {

    $User = new \App\user;
    $id = $this->getValue('id');
    
    $passObject = $User->where('id',$id)->first('pass');
    if($passObject != null){
        $hashedPassword = $passObject->pass;
    
        if(Hash::check($value,$hashedPassword)){
            return true;
        }

        return false;
    }

  }

}