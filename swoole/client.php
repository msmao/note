<?php
date_default_timezone_set("PRC");

$client = new Swoole\Client(SWOOLE_SOCK_TCP, SWOOLE_SOCK_ASYNC);

// 连接
$client->on("connect", function($cli) {
	// $message = date('H:i:s') . " hello world \n";
    $message = 'dev#12345#test';
    $cli->send($message);
});

// 接收
$client->on("receive", function($cli, $data) {
    echo "received: " . $data . "\n";
});

// 错误
$client->on("error", function($cli) {
    echo "connect failed \n";
});

// 断开
$client->on("close", function($cli) {
    echo "connection close \n";
});

// 连接
$client->connect('127.0.0.1', 9095, 0.5);