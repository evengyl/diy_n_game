<?php

class Config
{
    public static $hote = "localhost";
    public static $user = "root";
    public static $Mpass = "darkevengyl";
    public static $base = 'diy_n_game';

    public static function set_name_base($base)
    {
        self::$base = $base;
    }
}

