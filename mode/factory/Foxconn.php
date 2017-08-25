<?php

namespace mode\factory;


class Foxconn
{

    // 生产
    public static function produce($brand = null)
    {
        if ($brand)
            return new $brand;
        return false;
    }
}