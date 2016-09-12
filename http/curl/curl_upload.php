
<?php
$curl = curl_init();

$url = 'www.wsq.com/app/http/curl/upload.php';
$data = array('logo'=>'@D:\phpStudy\WWW\app\http\curl\2015-10-21_150123.png');

curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,$data);

curl_exec($curl);
curl_close($curl);