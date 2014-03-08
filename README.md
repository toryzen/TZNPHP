一个轻量级的MVC PHP框架
=======

一直都在用框架，没有尝试过写框架，这次来一个全新尝试。

目前0.0.5版本，在后期开发中会慢慢增强其功能

1、框架目录结构
<pre>
system
    | db
        mysqli.php
    | error
        404.php
        frame.php
    bootstrap.php
    debug.php
    common.php
    controller.php
    model.php
    dispatcher.php
    view.php
</pre>

实现基本的MVC

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
$app    = "app";	//APP目录
$system = "system"; //SYSTEM目录
$dubug  = false;	//DEBUG模式

if(is_dir($app)){
    $app = realpath($app)."\\";
}else{
    exit("App path not found !");
}

if(is_dir($system)){
    $system = realpath($system)."\\";
}else{
    exit("System path not found !");
}
$app    = str_replace("\\","/",$app);
$system = str_replace("\\","/",$system);

define("APP",$app);
define("SYSTEM",$system);
define("DEBUG",$dubug);

require SYSTEM."bootstrap.php";
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

基本上没事就写两笔，后期再发开预计整体目录结构会发生变化

* 2014-03-03 实现基本的MVC<br/\>
* 2014-03-04 新增Common.php并默认引入,新增Route.php实现基本的路由，优化Bootstrap.php<br/\>
* 2014-03-05 简单封装一下mysql操作类，为以后运入多数据库支持做准备<br/\>
* 2014-03-06 新增一个错误显示方法，新增error目录，model命名规范<br/\>
* 2014-03-07 目录结构变化一下，简易封装的数据库操作类都放入db下，并且将核心文件全部转为小写,utf8编码<br/\>
* 2014-03-08 Route.php更名dispatcher.php；新增debug.php,开启后实现时间与内存记录，并且可以在显示在页面底部；error目录更名html目录；view使用方式变化；强制规范windows下文件名称大小写

