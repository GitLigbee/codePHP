<?php
error_reporting(E_ALL);
set_time_limit(0);
echo "TCP/IP Connection\n";
$port = 9090;
$ip = "127.0.0.1";

/*
 +-------------------------------
 *    @socket连接整个过程
 +-------------------------------
 *    @socket_create
 *    @socket_connect
 *    @socket_write
 *    @socket_read
 *    @socket_close
 +--------------------------------
*/
$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
// 第一个参数”AF_INET”用来指定IPV4;
// 第二个参数”SOCK_STREM”告诉函数将创建一个什么类型的Socket(在这个例子中是TCP类型),UDP是SOCK_DGRAM

if ($socket < 0) {
    echo "socket_create() failed: reason: " . socket_strerror($socket) . "\n";
} else {
    echo "OK.\n";
}
echo "connect to '$ip' : '$port'...\n";
$result = socket_connect($socket, $ip, $port);
if ($result < 0) {
    echo "socket_connect() failed.\nReason: ($result) " . socket_strerror($result) . "\n";
} else {
    echo "connect is OK\n";
}
$num = rand(0, 1000);
$in = "Demo {$num}:\r\n";
$out = '';
if (!socket_write($socket, $in, strlen($in))) {
    echo "socket_write() failed: reason: " . socket_strerror($socket) . "\n";
} else {
    echo "post to server is successful\n";
    echo "the content is : $in";
}
while ($out = socket_read($socket, 8192)) {
    echo "receive the content is successful\n";
    echo "the content is :", $out;
}
echo "try to closse SOCKET...\n";
socket_close($socket);
echo "close is OK\n";