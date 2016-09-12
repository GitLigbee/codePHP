<?php 

	define("TOKEN","weixinCourse");

	function check_signature(){

		$signature = $_GET['signature'];
		$timestamp = $_GET['timestamp'];
		$nonce = $_GET['nonce'];
		

		$arr = array($nonce,$timestamp,TOKEN);
		sort($arr);

		$tmp = implode($arr);
		$tmp = sha1($tmp);

		if($tmp == $signature){
			return true;
		}else{
			return false;
		}

	}
	if(false==check_signature()){
		exit(0);
	}
	$echostr = $_GET['echostr'];
	if($echostr){
		echo $echostr;
		exit(0);
	}
?>