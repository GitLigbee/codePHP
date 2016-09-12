<?php

	class Factory{
		static protected $arr = array();
		static public function newMod($mode_name){
			if(!isset(Factory::$arr[$mode_name])){
				$file = $mode_name.'.class.php';
				require_once M_dir.$file;
				Factory::$arr[$mode_name] = new $mode_name;
			}
			return Factory::$arr[$mode_name];
		}
	}

 ?>