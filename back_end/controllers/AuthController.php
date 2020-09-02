<?php

namespace app\controllers;

use yii\web\Response;

class AuthController extends BaseAPIController
{                        
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
