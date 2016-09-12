<?php 

	$res = '{"from":"zh","to":"en","trans_result":[{"src":"\u4e2d\u56fd","dst":"China"}]}';
	// $res = {"from":"zh","to":"en"};
	$res = json_decode($res,true);
	
	if(is_array($res)){
		var_dump($res);
	}
	$res = $res['trans_result']; 
	$text = $res[0]['dst'];
	echo $text;
 ?>