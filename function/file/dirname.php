<?php 	

	// $dir = dirname('D:\phpStudy\WWW\function\dirname.php');
	$dir = dirname(__FILE__);
	echo __DIR__;
	echo '<br>'.$dir;
    define('ROOT',__DIR__.'/');
    echo ROOT.'/config/index.php';
 ?>