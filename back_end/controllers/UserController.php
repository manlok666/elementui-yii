<?php
namespace app\controllers;

use app\services\UserService;
use sizeg\jwt\JwtHttpBearerAuth;
use Yii;
use yii\db\Exception;
use yii\web\Response;
/**
 * UserController 用户控制器
 *
 * @author manlok <17wlqiu@gmail.com>
 * @since 0.1
 */
class UserController extends BaseAPIController
{
    /**
     * 权限验证
     * @inheritdoc
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        if (Yii::$app->getRequest()->getMethod() == 'OPTIONS') {
            exit;
        }
            $behaviors['authenticator'] = [
                'class' => JwtHttpBearerAuth::class,
                'optional' => [
                    'login',
                ],
            ];

        return $behaviors;
    }

    /**
     * 用户登录
     * @return array 登录结果
     */
    public function actionLogin()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $data = \Yii::$app->request->post();
        $username = $data['name'];
        $password = $data['password'];
        return (new UserService())->userLogin($username,$password);
    }

    /**
     * 用户修改密码
     * @return array|int|string
     * @throws Exception
     * @throws \Throwable
     */
    public function actionChangePassword()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $data = \Yii::$app->request->post();
        $old_password = $data['old_password'];
        $new_password = $data['new_password'];
        $again_password = $data['again_password'];
        $id = $this->findIdByToken();
        return (new UserService())->updatePass($old_password,$new_password,$again_password,$id);
    }

    /**
     * 返回用户信息
     * @return array|int|string
     * @throws Exception
     * @throws \Throwable
     */
    public function actionGetInfo()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $id = $this->findIdByToken();
        return (new UserService())->getUserInfo($id);
    }
}