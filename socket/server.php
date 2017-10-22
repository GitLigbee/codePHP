<?php
set_time_limit(0);
$ip = '127.0.0.1';
$port = 9090;

if (($sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP)) < 0) { // 创建一个Socket链接
    echo "socket_create()  fail:" . socket_strerror($sock) . "\n";
}
echo 'socket create successed' . PHP_EOL;
if (($ret = socket_bind($sock, $ip, $port)) < 0) { //绑定Socket到端口
    echo "socket_bind() fail:" . socket_strerror($ret) . "\n";
}
echo 'socket bind successed' . PHP_EOL;
if (($ret = socket_listen($sock, 4)) < 0) { // 开始监听链接链接
    echo "socket_listen() fail:" . socket_strerror($ret) . "\n";
}
echo 'socket listen successed' . PHP_EOL;
$count = 0;
do {
    if (($msgsock = socket_accept($sock)) < 0) { //堵塞等待另一个Socket来处理通信
        echo "socket_accept() failed: reason: " . socket_strerror($msgsock) . "\n";
        break;
    } else {
        //发送消息到客户端
        $msg = "test is successful\n";
        socket_write($msgsock, $msg, strlen($msg)); 
        //接收客户端消息
        echo "demo is successful\n";
        $buf = socket_read($msgsock, 8192); // 获得客户端的输入
        $talkback = "message received:$buf\n";
        echo $talkback;
        if (++$count >= 5) {
            break;
        };
    }
    //echo $buf;
    socket_close($msgsock);
} while (true);
socket_close($sock);