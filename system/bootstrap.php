<?php  if ( ! defined('SYSTEM')) exit('Go away!');

define("CORE","TNZPHP");
define("VERSION","0.0.1");

require(SYSTEM."Controller.php");
require(SYSTEM."View.php");
require(SYSTEM."Model.php");

$class  = isset($_GET['c'])?$_GET['c']:"Index";
$method = isset($_GET['m'])?$_GET['m']:"index";

if(file_exists(APP."config.php")){
    require(APP."config.php");
}else{
    exit("Config file not found !");
}

if(file_exists(APP."controllers/".$class.".php")){
    include(APP."controllers/".$class.".php");
    if(class_exists($class)){
        $VEW = new V();
        $C = new $class();
        if(method_exists($C,$method)){
            if($class!="Index" OR $method!="index"){
                $C->$method();
            }
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

if(isset($C->conn)){
    $C->conn->close();
}

function &mysql_driver(){
    global $config,$db;
    if(isset($db)){return $db;}
    $db = new mysqli($config['db']['hostname'],$config['db']['username'],$config['db']['password'],$config['db']['database']);
    $db->set_charset($config['db']['char_set']); 
    return $db;
}

    