# elementui-yii
vue+elementUI+yii2构建的前后端分离框架

## 框架架构
- 前端：vue+elementUI
- 后端：yii2

## 运行环境
- centos7+nginx+mysql+php

## 已有功能

- 数据库连接
- 后端api的token权限校验
- 前端的localStorage保存token/权限校验(登出会清除token)
- 通用登录页、主页
- 页面Header和Footer组件化
- api文档自动生成

## 配置相关

### composer安装依赖（在back_end目录运行）
```
composer install
```

### 数据库配置 /back_end/config/db.php

```'class' => 'yii\db\Connection',
'dsn' => 'mysql:host=10.192.180.210;dbname=vue_test',//ip地址自行修改
'username' => 'root',
'password' => '123',
'charset' => 'utf8',
```


### api文档生成（linux系统下在back_end目录运行）
```
 ./vendor/bin/apidoc api services ./output   --pageTitle=MeetingPlanner
```
`services`可改为controllers目录，对应控制层和服务层

## 说明

- 配置一下数据库和nginx服务器就没什么大问题了
