<?php
//引入组件
require_once './application/models/front.php';
require_once './application/models/icontroller.php';
require_once './application/models/view.php';
//引入控制器
require_once './application/controllers/IndexController.php';
//初始化前端控制器
$front = FrontController::getInstance();
$front->route();
echo $front->getBody();
