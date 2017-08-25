<?php
namespace app;

use mode\factory\Foxconn;
use mode\factory\Workshop;


// 自动加载器
require __DIR__ . '/../autoloader.php';

// ----------------------------

// 1. 通过 工厂模式的接口 创建实例
// 2. 通过 工厂的静态方法 创建实例



$workshop = new Workshop();
// 小作坊山寨了苹果、小米
$apple = $workshop->make('mode\factory\Apple');
$xiaomi = $workshop->make('mode\factory\Xiaomi');


// 富士康生产了苹果、小米
$apple = Foxconn::produce('mode\factory\Xiaomi');
$xiaomi = Foxconn::produce('mode\factory\Xiaomi');