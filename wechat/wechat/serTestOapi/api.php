<?php 
	header("Content-type:text/html;charset=utf-8");
	class api_select extends menu{
		private $arr = array();
		function __construct($arr) {
			$this->arr = $arr;
		}

		public function translate($word){
			$word_code=urlencode($word);
			$api = '23PL01FYviEaPVkY7l4nN1P0';
			$url = "http://openapi.baidu.com/public/2.0/bmt/translate?client_id=".$api."&q=".$word_code."&from=auto&to=auto";
			$translateRes = $this->curl_reponse($url,'GET',null,false,false);
			$res = json_decode($translateRes,true);
			$res = $res['trans_result']; 
			$text = $res[0]['dst'];
			
			return $text;
		}

		public function getMusic($arr){
			$url = 'http://box.zhangmen.baidu.com/x?op=12&count=1&title='.$arr['music'].'$$'.$arr['singer'].'$$$$';
        	$res = $this->curl_reponse($url);
        	$music = "No Find...";
        	try{
        		$res = simplexml_load_string($res, 'SimpleXMLElement', LIBXML_NOCDATA);
        	$music = $url;
        		foreach ($res->url as $value) {
			$music = "3";
				// echo strpos($value->encode, 'baidu.com').'a';
					if(isset($value->encode)&&isset($value->decode)&&strpos($value->encode, 'baidu.com')&&strpos($value->decode,'.mp3')){
					
						// $result[] = substr($value->encode, 0,strripos($value->encode, '/')+1).$value->decode;
						$result = substr($value->encode, 0,strripos($value->encode, '/')+1).$value->decode;
						if(strpos($result, '?')&&strpos($result,'xcode')){
							$music = array("tittle"=>$arr['music'],"description"=>$arr['singer'],"MusicUrl"=>$result,"HQMusicUrl"=>$result);
						
						}
					}
				}	
        	}catch(Exception $e){
        		$music = "No Find...error";
        	}
        	
        	return $music;
		}
		public function weather($location){
			$arr = array();
			$url = "http://api.map.baidu.com/telematics/v3/weather?location=".$location."&output=json&ak=".AK;
			$weather_json = $this->curl_reponse($url,'GET');
			$info = json_decode($weather_json,true);
			$arr['city'] = $info['results'][0]["currentCity"];
			foreach ($info['results'][0]['index'] as $key => $value) {
				$arr['do'][] = $value['des'];
			}
			foreach ($info['results'][0]["weather_data"] as $key => $value) {
				$arr['date'][] = $value['date'];
				$arr['dayPictureUrl'][] = $value['dayPictureUrl'];
				$arr['nightPictureUrl'][] = $value['nightPictureUrl'];
				$arr['weather'][] = $value['weather'];
				$arr['wind'][] = $value['weather'];
				$arr['temperature'][] = $value['weather'];
			}
			return $arr;
		}
		public function oauth(){
			$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".APPID."&redirect_uri=".REDIECT_URI."&response_type=code&scope=snsapi_userinfo&state=200#wechat_redirect";
			// $code = $this->curl_reponse($url,'POST');
			return $url;
		}
		public function ticket(){
			// $token = $this->get_accessToken();
			$token = $this->get_ticket();
			$url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=".$token;
			$data = '
				{
					"expire_seconds":604800,"action_name":"QR_SCENE","action_info":{"scene":{"scene_id":123}}
				}
			';
			$ticket_json = $this->curl_reponse($url,'POST',$data);
			$arr = json_decode($ticket_json,true);
			$ticket = $arr['ticket'];
			$ticket_url = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=".$ticket;
			return $ticket_url;
		}
		public function subkey($str){
			$length = mb_strlen($str,'UTF-8') - 3;
			$str = 	mb_substr($str, 3,$length,"UTF-8");
			return $str;
		}
	}

 ?>