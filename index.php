<?php

$app    = "app";
$system = "system";

if(is_dir($app)){
    $app = realpath($app)."\\";
}else{
    exit("app path not found !");
}
if(is_dir($system)){
    $system = realpath($system)."\\";
}else{
    exit("system path not found !");
}
$app    = str_replace("\\","/",$app);
$system = str_replace("\\","/",$system);
define("APP",$app);
define("SYSTEM",$system );

require SYSTEM."Bootstrap.php";

