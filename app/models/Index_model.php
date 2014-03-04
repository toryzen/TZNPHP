<?php  if ( ! defined('SYSTEM')) exit('Go away!');
class Index_model extends M{

    public function get_menu(){
        $sql = "SELECT * FROM rbac_menu";
        return $this->fetch_one($sql);
    }

}