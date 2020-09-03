<?php

namespace app\controllers;

use yii\web\Response;
/**
 * AuthController 测试控制器
 *
 * @author manlok <17wlqiu@gmail.com>
 * @since 0.1
 */
class AuthController extends BaseAPIController
{
    /**
     * 测试方法——模拟登录
     * @return array 登录结果
     */
    public function actionIndex()
    {  
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $username = \Yii::$app->request->post('name');
        $password = \Yii::$app->request->post('password');
        if($username == "admin" && $password == "admin")
        {
         return ['success'=>1,'msg'=>'100-token'];
        }
        return ['success'=>0,'msg'=>$username];
    }
}
