一个轻量级的MVC PHP框架
=======

一直都在用框架，没有尝试过写框架，这次来一个全新尝试。

目前0.0.1版本，没有路由分发，没有安全验证，没有考虑扩展性。在后期开发中会慢慢增强其功能

1、框架目录结构
<pre>
system
    Bootstrap.php
    Controller.php
    Model.php
    View.php
</pre>

四个文件实现基本的MVC

2、项目目录结构
<pre>
app
    | controllers
        Index.php
    | models
        Index.php
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
$config['db']['hostname'] = 'localhost';
$config['db']['username'] = 'root';
$config['db']['password'] = '';
$config['db']['database'] = '';
$config['db']['char_set'] = 'utf8';
</pre>

后期再发开预计整体目录结构会发生变化

路线&实现
路由分发
多数据库驱动
方法引入
公共类引入
