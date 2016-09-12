<?php 
// string substr  ( string $string  , int $start  [, int $length  ] )
	$str = "123456789";
	echo substr($str, 3,2).'<br>';
// 当length为负数时将过滤后面的字符
	echo substr($str, 3,-2).'<br>';
	echo substr($str, -1,1).'<br>';
	echo substr($str, -5,2).'<br>';
	echo substr($str, -5,-2).'<br>';
 ?>