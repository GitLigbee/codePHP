<?php 
	require_once C_dir.'factory.class.php';

//	 $match = new match_m();
	$match = Factory::newMod('match_m');
	$res = $match->match_list();
	require_once V_dir.'match.html';
 ?>