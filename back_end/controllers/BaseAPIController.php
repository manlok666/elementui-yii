<?php

namespace app\controllers;

use yii\rest\Controller;
use yii\filters\Cors;

class BaseAPIController extends Controller
{
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
