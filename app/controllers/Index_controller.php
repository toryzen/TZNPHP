<?php  if ( ! defined('SYSTEM')) exit('Go away!');

class Index_controller extends C{
	
	public function _init(){
		//echo "init";
	}
	//前置方法
	public function _before_index(){
		//echo "before";
	}
	
    public function index(){
    	//$this->V->mode = "TXT";
    	import("Common");
    	$this->load("Test","Test.class.php");
        $this->V->view("index");
    }
    //后置方法
    public function _after_index(){
    	//echo "after";
    }
    
    public function dbtest(){
    	$indexModel  = $this->model("Index_model");
    	print_r($indexModel->get_menu());
    }
   
}