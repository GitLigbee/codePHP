<?php 

	$en = "abcdefg";
	$zh = "中文字符串";

	echo strlen($en).'<br>';
	echo strlen($zh).'<br>';

	echo mb_strlen($zh,'UTF-8');
 ?>