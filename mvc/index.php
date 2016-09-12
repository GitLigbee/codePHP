<?php 

	$dir = __DIR__;
	// echo $dir;
	define('DIR',$dir);
	define('V_dir',$dir.'/view/');
	define('M_dir' , $dir.'/model/');
	define('C_dir' , $dir.'/controller/');
	require_once C_dir.'match_c.php';
 ?>