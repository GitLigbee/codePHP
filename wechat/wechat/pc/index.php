<?php 
	
	define("TOKEN", "pc_no_two");
	define("APPID", "wx5863e1f4d323e45e");
	define("APPSECRET", "9b724a004fedabd09824958121e2d2d1");
	define("REDIECT_URI","http://wxyx.weidianit.com/wsq/serTestOapi/oauth.php");
	//define("AK","Q9d8yC1oisP8CCMjqoP6ap6x");
    
    //baidu fanyi
    define("APP_ID","20160228000013885"); //替换为您的APPID
    define("SEC_KEY","wNc4kkhufpHWJQ1AGmdP");//替换为您的密钥
	
    // http://api.map.baidu.com/telematics/v3/weather?location=北京&output=json&ak=yourkey
	// require 'server.php';
	define("CURL_TIMEOUT",10); 
    define("URL","http://api.fanyi.baidu.com/api/trans/vip/translate"); 
    require_once('baidu_transapi.php');
	
    // require_once('common.php');
//	require_once('menu.php');
	require_once('api.php');
	// require_once('oauth.php');
	require_once('wx_sample.php');
 ?>