<?php  if ( ! defined('SYSTEM')) exit('Go away!');
class C{

    public $conn;
    public $Models;
    
    public function view($filename,$data_array){
        global $VEW;
        $file_path = APP."/views/".$filename.".html";
        if(file_exists($file_path)){
            ob_start();
            if(is_array($data_array)){
                foreach($data_array as $key=>$value){
                    $$key = $value;
                }
            }
            include($file_path);
            $VEW->contents = ob_get_contents();
            @ob_end_clean();
        }else{
            exit("View file not found ! ");
        }
    }
    
    public function model($filename){
        if(isset($this->Models[$filename])){return $this->Models[$filename];  }
        $file_path = APP."/models/".$filename.".php";
        if(file_exists($file_path)){
            $class_name = $filename."_model";
            include($file_path);
            if(class_exists($class_name)){
                $this->conn = &mysql_driver();
                $this->Models[$filename] = new $class_name($this->conn);
                return $this->Models[$filename];
            }else{
                exit("Model class not found ! ");
            }
        }else{
            exit("Model file not found ! ");
        }
    }
}