<?php

function autoload($class)
{
    $base = __DIR__;

    $prefix = 'mode';
    if (strlen($prefix)){
        $class = str_replace($prefix, '', $class);
        echo $class . PHP_EOL;
    }

    $file = $base . str_replace('\\', '/', $class) . '.php';
    echo $file . PHP_EOL;

    if (file_exists($file))
        require $file;
}

spl_autoload_register('autoload');