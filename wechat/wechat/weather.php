<?php 
	header("Content-type:text/html;charset=utf-8");
	$url = "http://api.map.baidu.com/telematics/v3/weather?location=北京&output=json&ak=Q9d8yC1oisP8CCMjqoP6ap6x";
	$res = curl_reponse($url);
	// echo $res;
	$res = json_decode($res,true);
	echo $res['results'][0]["currentCity"];
	var_dump($res['results'][0]);

	//穿衣+洗车+旅游+感冒+运动+紫外线强度
	/*foreach($res['results'][0]['index'] as $key => $value){
		$arr['do'][] = $value['des'];
	}
	var_dump($arr['do']);
*/
	
	// var_dump($res['results'][0]["weather_data"][0]["date"]);

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