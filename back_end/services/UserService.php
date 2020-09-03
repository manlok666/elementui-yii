<?php
namespace app\services;

use app\models\UserModel;
use Lcobucci\JWT\Parsing\Encoder;
use sizeg\jwt\Jwt;
use Yii;
use yii\db\Exception;

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
     * @param string $username 用户名
     * @param string $password 密码
     * @return array 验证结果
     */
    public function userLogin($username,$password)
    {
        $check = UserModel::find()->where(['username' => $username])->asArray()->one();
        if (empty($check)) {
            return ['success'=>0,'msg'=>'用户名不正确！'];
        } elseif ($check['password'] == md5($password)) {

            /** @var Jwt $jwt */
            $jwt = Yii::$app->jwt;
            $signer = $jwt->getSigner('HS256');
            $key = $jwt->getKey();
            $time = time();
            $token = $jwt->getBuilder()
                ->issuedBy('http://manlok.com')// Configures the issuer (iss claim)
                ->permittedFor('http://manlok.org')// Configures the audience (aud claim)
                ->identifiedBy('manlok', true)// Configures the id (jti claim), replicating as a header item
                ->issuedAt($time)// Configures the time that the token was issue (iat claim)
                ->expiresAt($time + 3600)// Configures the expiration time of the token (exp claim)
                ->withClaim('uid', '100')// Configures a new claim, called "uid"
                ->withClaim('id', $check['id'])// Configures a new claim, called "uid"
                ->getToken($signer, $key); // Retrieves the generated token

            return ['success'=>1,'msg'=> (string)$token];
        }
        return ['success'=>0,'msg'=>'密码错误！'];
    }

    /**
     * 用户修改密码方法
     * @param string $old_password 旧密码
     * @param string $new_password 新密码
     * @param string $again_password 再次输入的新密码
     * @param int $id 用户ID
     * @return array 验证结果
     * @throws Exception
     */
    public function updatePass($old_password,$new_password,$again_password,$id)
    {
        if($new_password != $again_password){
            return ['success'=>0,'msg'=>'两次新密码输入不一致！'];
        }
        $check = UserModel::find()->where(['id' => $id])->asArray()->one();
        if (empty($check)) {
            return ['success'=>0,'msg'=>'用户ID非法！'];
        } elseif ($check['password'] == md5($old_password)) {
            $data =[
                'password' => md5($new_password),
            ];
             UserModel::find()->createCommand()->update(UserModel::tableName(),$data, "id=:id", array(':id' => $id))->execute();
        }else{
            return ['success'=>0,'msg'=>'旧密码不正确！'];
        }
        return ['success'=>1,'msg'=>'修改成功！'];
    }

    /**
     * 返回用户信息方法
     * @param $id 用户ID
     * @return array 信息
     */
    public function getUserInfo($id)
    {
       return UserModel::find()->where(['id'=> $id])->asArray()->one();
    }
}