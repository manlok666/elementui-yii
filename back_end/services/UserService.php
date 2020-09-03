<?php
namespace app\services;

use app\models\UserModel;
/**
 * UserService 用户服务
 *
 * @author manlok <17wlqiu@gmail.com>
 * @since 0.1
 */
class UserService
{
    /**
     * 用户登录方法
     * @param array $param 用户名、密码
     * @return bool 验证结果
     */
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