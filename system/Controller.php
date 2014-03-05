<?php  if ( ! defined('SYSTEM')) exit('Go away!');
/**
 * ��������
 * @author toryzen
 *
 */
class C{

    public $conn;
    public $Models;
    
    private static $instance;
    
    public function __construct(){
    	self::$instance =& $this;
    	//������������ĺ�����
    	foreach(save_load() as $class){
    		$this->core->$class = &load($class);
    	}
    }
    
    /**
     * ��ͼ��ʾ
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
            exit("View file not found ! ");
        }
    }
    
    /**
     * ģ��ʵ����
     * @param unknown $filename
     */
    public function model($filename="M"){
    	//����Ѿ�ʵ��������ֱ�ӷ���
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
                exit("Model class not found ! ");
            }
        }else{
            exit("Model file not found ! ");
        }
    }
    
    /**
     * ��ȡ��������
     * @return C
     */
    public static function & get_inst(){
    	return self::$instance;
    }
}