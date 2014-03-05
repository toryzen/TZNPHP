<?php  if ( ! defined('SYSTEM')) exit('Go away!');
class Index extends C{
	
	public function __construct(){
		parent::__construct();
	}
	
    public function index(){
        $this->view("index");
    }
    
    public function dbtest(){
    	$indexModel  = $this->model("Index_model");
    	print_r($indexModel->get_menu());
    }
   
}