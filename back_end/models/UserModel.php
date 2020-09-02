<?php


namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class UserModel extends ActiveRecord
{
    public static function getDb()
    {
        return Yii::$app->get('db');
    }

    public static function tableName()
    {
        return 'vue_user';
    }
}