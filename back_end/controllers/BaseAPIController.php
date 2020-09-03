<?php

namespace app\controllers;

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
                'Access-Control-Request-Headers' => ['Content-Type','Content-Length','Authorization','Accept','X-Requested-With','yourHeaderFeild'],
                'Access-Control-Allow-Credentials' => false,
                'Access-Control-Max-Age' => 8600,
                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
            ],
 
        ],
    ];
}
}
