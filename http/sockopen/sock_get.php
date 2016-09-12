<?php
$host = 'www.hotel.wsq.com';
$port = '80';
$link = fsockopen($host,$port);
//var_dump($link);
define('CRLF',"\r\n");
//请求行
$req = 'GET /index.php HTTP/1.1'.CRLF;

//请求头
$req.='HOST:www.hotel.wsq.com'.CRLF;
$req.='User-Agent:Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36'.CRLF;
$req.='Connection:keep-alive'.CRLF;
//空行表结束
$req.=CRLF;

//请求主体
//GET没有主体

//发送请求
fwrite($link,$req);

//处理响应数据
while(!feof($link)){
    echo fgets($link,1024);
}
//断开连接
fclose($link);