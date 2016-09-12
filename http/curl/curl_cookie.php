<?php
$curl = curl_init();

$url = 'www.hotel.wsq.com';
$data = array('username'=>'wsqhotel@qq.com','password'=>'manager');

curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_POST,true);
curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
curl_setopt($curl,CURLOPT_COOKIEJAR,'D:\phpStudy\WWW\app\http\curl\cookie.txt');
//curl_setopt($curl,CURLOPT_HEADER,true);


curl_exec($curl);
curl_close($curl);


$curl = curl_init();
$url = 'www.hotel.wsq.com/index.php?p=admin&c=index&a=index&l=1';

curl_setopt($curl,CURLOPT_URL,$url);
curl_setopt($curl,CURLOPT_COOKIEFILE,'D:\phpStudy\WWW\app\http\curl\cookie.txt');

curl_exec($curl);
curl_close($curl);