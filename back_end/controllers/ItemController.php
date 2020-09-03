<?php

namespace app\controllers;

use sizeg\jwt\JwtHttpBearerAuth;
use Yii;
/**
 * ItemController 主页控制器
 *
 * @author manlok <17wlqiu@gmail.com>
 * @since 0.1
 */

class ItemController extends BaseAPIController
{
    /**
     * 权限验证
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        if (Yii::$app->getRequest()->getMethod() !== 'OPTIONS') {
            $behaviors['authenticator'] = [
                'class' => JwtHttpBearerAuth::class,
            ];
        }
        return $behaviors;
    }

    /**
     * 放回主页信息
     * @return array 主页信息
     */
    public function actionIndex()
    {
        return ['success'=>1,'msg'=>'你看到这个网页证明你已经登录成功了！'];
    }


}
