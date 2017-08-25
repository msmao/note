<?php
date_default_timezone_set("PRC");  

$serv = new Swoole\Server("127.0.0.1", 9501);

$serv->set([
    'worker_num' => 2,   // 工作进程数量
    // 'daemonize' => true, // 是否作为后台守护进程
    'log_file' => './logs/' . date('Ymd') . '.log'
]);

// 启用主进程
$serv->on('start', function($serv) {
	// 设置主进程名称（macOS不支持）
	// cli_set_process_title("swoole"); 
	// 打印主进程的ID、管理进程的ID
	echo date('H:i:s') . ' master_pid:' . $serv->master_pid. ', manager_pid:' . $serv->manager_pid ."\n";
});

// 连接
$serv->on('connect', function ($serv, $fd){
    echo date('H:i:s') ." client connect.\n";
});

// 接收
$serv->on('receive', function ($serv, $fd, $from_id, $data) {
	echo date('H:i:s') . " server receive fd:". $fd . " from_id:" . $from_id . " data:" . $data ."\n";
    $serv->send($fd, 'server send data:'.$data);
    $serv->close($fd);
});

// 断开
$serv->on('close', function ($serv, $fd) {
    echo date('H:i:s') . " client close.\n";
});

// 启动 主进程 + Manager进程 + worker_num个 Worker进程
$serv->start();