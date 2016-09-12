<?php 

	$arrayName = array('city' =>'guangdong', 'weather'=>'sunny');
	$arr = $arrayName;
	var_dump($arr);

	$arr = array();
	$arr['music'] = 'music';
	$arr['singer'] = 'jack';
	var_dump($arr);

    change($arr);
    function change(&$arr){
        $arr['singer'] = 'tom';
    }
    var_dump($arr);
 ?>