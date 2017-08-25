<?php

namespace mode\factory;

class Workshop implements Factory
{
    // 制造
    public function make($brand = null)
    {
        if ($brand)
            return new $brand;
        return false;
    }
}