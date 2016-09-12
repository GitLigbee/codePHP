<?php 

	define("APPID", "wxa7cf862e94047528");
	define("APPSECRET", "eb23b7d796dc05a66bde823973a38df1");
	require 'menu.php';
	class oauth extends menu{
		function get_accessToken(){
			;
		}
	}
	if(isset($_GET['code'])){
		
		$code = $_GET['code'];
		$url_access_token = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".$code."&grant_type=authorization_code";
		// $json = $curl->curl_reponse($url_access_token);
		$oath = new oauth();
		$access_json = $oath->curl_reponse($url_access_token);
		$arr = json_decode($access_json,true);
		// echo $arr['access_token'];
		$url_info = "https://api.weixin.qq.com/sns/userinfo?access_token=".$arr['access_token']."&openid=".$arr['openid'];
		$user_info = $oath->curl_reponse($url_info);
		// $arr_info = json_decode($url_info,true);
		echo $user_info;
	}else{
		echo 'error';
	}

 ?>