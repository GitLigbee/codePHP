<?php 
	// $url = 'http://shopcgi.qqmusic.qq.com/fcgi-bin/shopsearch.fcg?value=%B4%F3%D4%BC%D4%DA%B6%AC%BC%BE&artist=&page_record_num=1';
	// $url = 'http://box.zhangmen.baidu.com/x?op=12&count=1&title=黄昏$$周传雄$$$$';
	$url = 'http://box.zhangmen.baidu.com/x?op=12&count=1&title=demons$$Imagine Dragons$$$$';
	$res = curl_reponse($url);
	$res = simplexml_load_string($res, 'SimpleXMLElement', LIBXML_NOCDATA);
	// var_dump($res); 	
	// $result = array();
	// $music = array();
	$encode = $res->url->encode;
	$decode = $res->url->decode;
	// echo $encode.'<br>'.$decode.'<br>';
	foreach ($res->url as $value) {
		
		// echo strpos($value->encode, 'baidu.com').'a';
		if(isset($value->encode)&&isset($value->decode)&&strpos($value->encode, 'baidu.com')&&strpos($value->decode,'.mp3')){
			
			// $result[] = substr($value->encode, 0,strripos($value->encode, '/')+1).$value->decode;
			$result = substr($value->encode, 0,strripos($value->encode, '/')+1).$value->decode;
			if(strpos($result, '?')&&strpos($result,'xcode')){
				$music = array("Tittle"=>"黄昏","Description"=>"song","MusicUrl"=>urlencode($result),"HQMusicUrl"=>urlencode($result));
			}
		}
	}
	// $result = substr($value->encode, 0,strripos($value->encode, '/')+1).$value->decode;
	// echo $result.'<br>';
	// var_dump($result);
	var_dump($music);

	function curl_reponse($url,$method='GET',$data=null,$access=false,$https=true){
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			if($https){
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
			}
			if($method=='POST'){

				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			}
			curl_setopt($ch, CURLOPT_HEADER, 0);
			$content = curl_exec($ch);
			curl_close($ch);
			
			if($access){
				$json = json_decode($content,true);
				$this->access_token = $json['access_token'];
			}
			// var_dump($json);
			return $content;
		}
 ?>