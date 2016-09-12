<?php 

	$info = file_get_contents('http://www.baidu.com/');
	// echo $info;
	echo '</br>';
	$info = file_get_contents('test.txt',null,null,4,5);
	echo $info;
	echo '</br>';
	
 ?>