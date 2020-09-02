<?php
namespace app\services;

use app\models\UserModel;

class UserService
{
  public function userLogin($param){
      $check = UserModel::find()->where(['username' => $param['name']])->asArray()->one();
      if(empty($check)){
          return false;
      }elseif($check['password'] == md5($param['password'])){
          $session['user_id'] = $check['id'];
          $session['username'] = $check['username'];
          return true;
      }
      return false;
  }
}