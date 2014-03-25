<?php  if ( ! defined('SYSTEM')) exit('Go away!');
/**
 * DB接口
 * @author toryzen 
 * 
 */
interface DB_interface {

    public function query();
    
    public function fetch_one();
    
    public function fetch_all();
    
}