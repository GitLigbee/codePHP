<?php 
	header("Content-type:text/html;charset=utf-8");
	$str = "AabcdefgaA";
	$find = "a";
	// 不区分大小写
	echo stripos($str, $find).'<br>';
	// 区分大小写
	echo strpos($str, $find).'<br>';

	echo strrpos($str,$find).'<br>';
	echo strripos($str,$find).'<br>';

	$str = "晴天+周杰伦";
	$symbol = "+";
	$pos = mb_strpos($str,$symbol,0,'UTF-8');
	echo $pos.'<br>';
	$front = mb_substr($str, 0,$pos,'UTF-8');
	$behind = mb_substr($str, $pos+1,mb_strlen($str,'UTF-8'),'UTF-8');
	echo $front.'__'.$behind;
 ?>