<?php  if ( ! defined('SYSTEM')) exit('Go away!');
/**
 * 控制器类
 * @author toryzen
 *
 */
class C{

    public $conn;
    public $Models;
    
    private static $instance;
    
    public function __construct(){
    	self::$instance =& $this;
    	//载入已载入过的核心类
    	foreach(save_load() as $class){
    		$this->core->$class = &load($class);
    	}
    }
    
    /**
     * 视图显示
     * @param unknown $filename
     * @param unknown $data_array
     */
    public function view($filename,$data_array=array()){
        $file_path = APP."/views/".$filename.".html";
        if(file_exists($file_path)){
            ob_start();
            if(is_array($data_array)){
                foreach($data_array as $key=>$value){
                    $$key = $value;
                }
            }
            include($file_path);
            $this->core->V->contents = ob_get_contents();
            @ob_end_clean();
        }else{
        	show_error("视图文件没有找到！文件:".$file_path);
        }
    }
    
    /**
     * 模型实例化
     * @param unknown $filename
     */
    public function model($filename="M"){
    	//如果已经实例化过则直接返回
        if(isset($this->Models[$filename])){return $this->Models[$filename];  }
        $file_path = APP."/models/".$filename.".php";
        if(file_exists($file_path)||$filename=='M'){
            $class_name = $filename;
            $this->conn = &db_driver();
            include($file_path);
            if(class_exists($class_name)||$filename=='M'){
                $this->Models[$filename] = new $class_name($this->conn);
                return $this->Models[$filename];
            }else{
            	$this->conn->close();
            	show_error("模型类没有找到！类：".$class_name."文件:".$file_path);
            }
        }else{
        	show_error("模型文件没有找到！文件:".$file_path);
        }
    }
    
    /**
     * 获取超级对象
     * @return C
     */
    public static function & get_inst(){
    	return self::$instance;
    }
}