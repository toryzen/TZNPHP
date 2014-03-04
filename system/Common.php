<?php  if ( ! defined('SYSTEM')) exit('Go away!');

/**
 * 载入类
 */
if(!function_exists("load")){
	
	function &load($class,$file=""){
		static $_class;
		if(isset($_class[$class])){
			return $_class[$class];
		}
		$file_ok = FALSE;
		foreach(array(APP,SYSTEM) as $DIR){
			if(file_exists($DIR.$file)){
				if(!class_exists($class)){
					include($DIR.$file);
					$file_ok = TRUE;
					break;
				}
			}
		}
		if(!$file_ok){
			exit("Class file not found!");
		}
		
		if(!class_exists($class)){
			exit("Class not found!");
		}
		$_class[$class] = new $class();
		save_load($class);
		return $_class[$class];
	}
}

/**
 * 记录载入的类
 */
if(!function_exists("save_load")){

	function &save_load($class=""){
		static $is_load = array();
		if($class!=""){
			$is_load[strtolower($class)] = $class;
		}
		return $is_load;
	}
}
