<?php  if ( ! defined('SYSTEM')) exit('Go away!');
class Index extends C{

    public function index(){
        $indexModel  = $this->model("Index");
        $this->view("index",array('const'=>$indexModel->get_menu()));
    }
   
}