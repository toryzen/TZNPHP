一个轻量级的MVC PHP框架
=======

一直都在用框架，没有尝试过写框架，这次来一个全新尝试。

目前0.0.4版本，在后期开发中会慢慢增强其功能

1、框架目录结构
<pre>
system
    | db
        mysqli.php
    | error
        404.php
        frame.php
    bootstrap.php
    common.php
    controller.php
    model.php
    route.php
    view.php
</pre>

四个文件实现基本的MVC

2、项目目录结构
<pre>
app
    | controllers
        Index.php
    | models
        Index_model.php
    | views
        index.html
    config.php
</pre>

3、入口 index.php 内容：
<pre>
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
</pre>

4、配置文件config.php
<pre>
//数据库配置
$config_db['db_type']  = 'mysql' 
$config_db['hostname'] = 'localhost';
$config_db['username'] = 'root';
$config_db['password'] = '';
$config_db['database'] = 'ci_rbac';
$config_db['char_set'] = 'utf8';

//路由配置
$config_rt['type']     = '2';	  						//URL模式,1:默认($_GET['c']:控制器,$_GET['m']:方法),2:PathInfo,3:混合
$config_rt['class']    = 'Index'; 						//默认控制器类
$config_rt['method']   = 'index'; 						//默认方法
$config_rt['redict']['Index/test']   = 'Index/index';   //重定向
</pre>

后期再发开预计整体目录结构会发生变化

路线&实现
路由分发
多数据库驱动
方法引入
公共类引入

