<?php
namespace app\controllers;


use app\services\UserService;
use yii\web\Response;

class UserController extends BaseAPIController
{
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