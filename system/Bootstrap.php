<?php  if ( ! defined('SYSTEM')) exit('Go away!');

define("CORE","TNZPHP");
define("VERSION","0.0.2");

//检测配置文件
if(file_exists(APP."config.php")){
	require(APP."config.php");
}else{
	exit("Config file not found !");
}

//引入公共方法
require(SYSTEM."Common.php");

//引入基础控制器
require(SYSTEM."Controller.php");

//引入基础模型
require(SYSTEM."Model.php");

//引入路由
$RT = &load("R","Route.php");

$class  = $RT->class;
$method = $RT->method;

if(file_exists(APP."controllers/".$class.".php")){
    include(APP."controllers/".$class.".php");
    if(class_exists($class)){
        $VEW = &load("V","View.php");
        //实例化控制器
        $Controller = new $class();
        if(method_exists($Controller,$method)){
            //调用方法
            $Controller->$method();
            //输出
            $VEW->output();
        }else{
            exit("Method not found !");
        }
    }else{
        exit("Class not found !");
    }
}else{
    exit("Class file not found !");
}


//关闭数据库连接
if(isset($Controller->conn)){
    $Controller->conn->close();
}

//获取控制器对象
function &get_inst(){
	return C::get_inst();
}

//Mysql驱动
function &mysql_driver(){
    global $config_db,$db;
    if(isset($db)){return $db;}
    $db = new mysqli($config_db['hostname'],$config_db['username'],$config_db['password'],$config_db['database']);
    $db->set_charset($config_db['char_set']);
    if(!$db){
    	exit($db->error);
    }
    return $db;
}

    