<?php

namespace app\controllers;

use sizeg\jwt\Jwt;
use Yii;
use yii\rest\Controller;
use yii\filters\Cors;
/**
 * BaseAPIController 基层控制器
 *
 * @author manlok <17wlqiu@gmail.com>
 * @since 0.1
 */
class BaseAPIController extends Controller
{
    /**
     * 跨域设置
     */
    public function init()
    {
        return [
            'corsFilter' => [
                'class' => Cors::className(),
                'cors' => [
                    // restrict access to
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['*'],
                    'Access-Control-Request-Headers' => ['Content-Type', 'Content-Length', 'Authorization', 'Accept', 'X-Requested-With', 'yourHeaderFeild'],
                    'Access-Control-Allow-Credentials' => false,
                    'Access-Control-Max-Age' => 8600,
                    'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                ],

            ],
        ];
    }

    /**
     * 通过token查询用户id
     * @throws \Throwable
     * return int
     */
    public function findIdByToken() {
        /** @var Jwt $jwt */
        $authHeader = Yii::$app->request->getHeaders()->get('Authorization');
        preg_match('/^' . $this->schema . '\s+(.*?)$/', $authHeader, $matches);
        $jwt = Yii::$app->jwt;
        return $jwt->loadToken($matches[1])->getClaim('id');
    }


}
