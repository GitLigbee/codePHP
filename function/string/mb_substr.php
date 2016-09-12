<?php 
header("Content-type:text/html;charset=utf-8");
	$str = "bee";
	echo mb_substr($str, 1,2)."<br>";
	$stro = "翻译：english";

	echo mb_substr($stro, 0,2,"UTF-8").'<br>';

	if(mb_substr($stro, 0,2,"UTF-8")=="翻译"){
		$length = mb_strlen($stro,'UTF-8') - 3;
		echo mb_substr($stro, 3,$length,"UTF-8");
	}
 ?>