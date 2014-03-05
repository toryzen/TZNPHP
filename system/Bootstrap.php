<?php  if ( ! defined('SYSTEM')) exit('Go away!');
/**
 * 引导文件
 * @author toryzen 
 * 
 */
define("CORE","TNZPHP");
define("VERSION","0.0.3");


//引入公共方法
require(SYSTEM."common.php");

//检测配置文件
if(file_exists(APP."config.php")){
	require(APP."config.php");
}else{
	show_error("没有找到配置文件!\n文件:".APP."config1.php");
}

//引入基础控制器
require(SYSTEM."controller.php");

//引入路由
$RT = &load("R","route.php");

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
        	show_error("没有找到可用方法! 方法：'".$method."' 文件:".APP."controllers/".$class.".php");
        }
    }else{
    	show_error("没有找到可用类! 类名：'".$class."' 文件:".APP."controllers/".$class.".php");
    }
}else{
	show_error("没有找到控制器! 文件:".APP."controllers/".$class.".php");
}


//关闭数据库连接
if(isset($Controller->conn)){
    $Controller->conn->close();
}

//获取控制器对象
function &get_inst(){
	return C::get_inst();
}

//数据驱动
function &db_driver(){
    global $config_db,$db;
    if(isset($db)){return $db;}
    //print_r($config_db);
    switch ($config_db['db_type']){
    	case "mysql":
    		require_once(SYSTEM.'db/mysqli.php');
    		$db = new mysqli($config_db['hostname'],$config_db['username'],$config_db['password'],$config_db['database']);
    		$db->set_charset($config_db['char_set']);
    		if(!$db){
    			show_error("数据库连接错误! 信息:".$db->error);
    		}
    		break;
    	default:
    		show_error("不支持该类型的数据库! 类型:".$config_db['db_type']);
    }
    require_once(SYSTEM."model.php");
    return $db;
}

    