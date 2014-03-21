<?php  if ( ! defined('SYSTEM')) exit('Go away!');
/**
 * Mysql数据库操作(Mysqli)
 * @author toryzen 
 * 
 */
class DB {

    public $conn;
    
    public function __construct($conn){
    	if(!$conn)exit("Database Connect Error!");
        $this->conn = $conn;
    }
    
    /**
     * 执行Query
     * @param string $sql
     * @return unknown
     */
    public function query($sql){
    	if(!$sql)return;
        $query = $this->conn->query($sql);
        return $query;
    }
    
    /**
     * 获取一条记录
     * @param string $sql
     * @return unknown
     */
    public function fetch_one($sql){
    	if(!$sql)return;
        $query = $this->conn->query($sql);
        $result = $query->fetch_array();
        return $result;
    }
    
    /**
     * 获取全部记录
     * @param string $sql
     * @return unknown
     */
    public function fetch_all($sql){
    	if(!$sql)return;
        $query = $this->conn->query($sql);
        while($row = $query->fetch_array()){
            $result[] = $row;
        }
        return $result;
    }
    
}