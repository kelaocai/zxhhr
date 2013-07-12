<?php
define("APP_PATH",dirname(__FILE__));
define("SP_PATH",dirname(__FILE__).'/SpeedPHP');
require (APP_PATH . "/include/config.php");

$spConfig = array(
"db" => array(
'host' => DB_HOST, // 数据库地址
'login' => DB_USER, // 数据库用户名
'password' => DB_PASSWORD, // 数据库密码
'database' => DB_DATABASE), 
'view' => array(
                'enabled' => TRUE, // 开启Smarty
                'config' =>array(
                        'template_dir' => APP_PATH.'/tpl', // 模板存放的目录
                        'compile_dir' => APP_PATH.'/tmp', // 编译的临时目录
                        'cache_dir' => APP_PATH.'/tmp', // 缓存的临时目录
                        'left_delimiter' => '{',  // smarty左限定符
                        'right_delimiter' => '}', // smarty右限定符
                )
			)
			, 'include_path' => array(APP_PATH . '/include') // 用户程序扩展类载入路径
			
);
require(SP_PATH."/SpeedPHP.php");
spRun();
