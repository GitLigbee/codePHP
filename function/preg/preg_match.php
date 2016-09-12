<?php 

	
// int preg_match  ( string $pattern  , string $subject  [, array &$matches  [, int $flags  = 0  [, int $offset  = 0  ]]] )
	$str = "abcdefgabcdbc";
	// $pattern = '/^abc/';
	$pattern = '/[da]bc/';
	echo 'preg_match:'.preg_match($pattern, $str).'<br>';
	echo 'preg_match_all:'.preg_match_all($pattern, $str,$matches).'<br>';
	var_dump($matches);
 ?>