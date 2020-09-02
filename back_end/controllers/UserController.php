<?php
namespace app\controllers;

use app\services\UserService;
use yii\web\Response;
/**
 * TestController 用户控制器
 *
 * @author manlok <17wlqiu@gmail.com>
 * @since 0.1
 */
class UserController extends BaseAPIController
{
    /**
     * 用户登录
     * @param string name 用户名
     * @param string password 密码
     * @return string 登录结果
     */
    public function actionLogin()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $data = \Yii::$app->request->post();
        if((new UserService())->userLogin($data))
        {
            return ['success'=>1,'msg'=>'100-token'];
        }
        return ['success'=>0,'msg'=>'登录失败'];
    }
}