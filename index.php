<?php
//cms项目 入口文件
//开启调试模式
define('APP_DEBUG', TRUE);

//定义应用目录
define('APP_PATH', './Application/'); 

//定义安全文件的名字为default.html
define('DIR_SECURE_FILENAME', 'default.html');

//引入tp入口文件
require './ThinkPHP/ThinkPHP.php'; 