<?php  if ( ! defined('SYSTEM')) exit('Go away!');

class M {

    public $conn;
    
    public function __construct($conn){
        $this->conn = $conn;
    }
    
    /**
     * 执行Query
     * @param unknown $sql
     * @return unknown
     */
    public function query($sql){
        $query = $this->conn->query($sql);
        return $query;
    }
    
    /**
     * 获取一条记录
     * @param unknown $sql
     * @return unknown
     */
    public function fetch_one($sql){
        $query = $this->conn->query($sql);
        $result = $query->fetch_array();
        return $result;
    }
    
    /**
     * 获取全部记录
     * @param unknown $sql
     * @return unknown
     */
    public function fetch_all($sql){
        $query = $this->conn->query($sql);
        while($row = $query->fetch_array()){
            $result[] = $row;
        }
        return $result;
    }
    
}