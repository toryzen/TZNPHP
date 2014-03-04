<?php  if ( ! defined('SYSTEM')) exit('Go away!');

define("CORE","TNZPHP");
define("VERSION","0.0.2");

//��������ļ�
if(file_exists(APP."config.php")){
	require(APP."config.php");
}else{
	exit("Config file not found !");
}

//���빫������
require(SYSTEM."Common.php");

//�������������
require(SYSTEM."Controller.php");

//�������ģ��
require(SYSTEM."Model.php");

//����·��
$RT = &load("R","Route.php");

$class  = $RT->class;
$method = $RT->method;

if(file_exists(APP."controllers/".$class.".php")){
    include(APP."controllers/".$class.".php");
    if(class_exists($class)){
        $VEW = &load("V","View.php");
        //ʵ����������
        $Controller = new $class();
        if(method_exists($Controller,$method)){
            //���÷���
            $Controller->$method();
            //���
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


//�ر����ݿ�����
if(isset($Controller->conn)){
    $Controller->conn->close();
}

//��ȡ����������
function &get_inst(){
	return C::get_inst();
}

//Mysql����
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

    