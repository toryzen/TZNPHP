<?php  if ( ! defined('SYSTEM')) exit('Go away!');
/**
 * 视图类
 * @author Huangzhen 
 *
 */
class V{

    public $contents;
    
    public function output(){
    
        echo $this->contents;
        
    }
    
}