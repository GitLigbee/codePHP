<?php 
	header("Content-type:text/html;charset=utf-8");
	
	$arrayName = array('city' => '广东','goods'=>'cookies' ); 
	$arr = json_encode($arrayName);
	echo $arr."</br>";
	
	var_dump(json_decode($arr));
	echo "</br>";
	echo urldecode(json_encode(ch_json($arrayName)))."</br>";
/*	
	需要php版本在5.4以上
	echo json_encode($arrayName,JSON_UNESCAPED_UNICODE);
*/

	function ch_json($arr){
		if(is_array($arr)){
			foreach ($arr as $key => $value) {
				$arr[urlencode($key)] = ch_json($value); 
			}
		}else{
			return urlencode($arr);
		}
		return $arr;
	}
 ?>