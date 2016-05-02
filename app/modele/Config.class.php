<?php

class Config
{
    public static $hote = "localhost";
    public static $user = "root";
    public static $Mpass = "darkevengyl4242";
    public static $base = 'diy_n_game';

    public static $path_app = "../app";
    public static $path_public = "../public";
    public static $base_path = "/diy_n_game";

    public static $mail = "dark.evengyl@gmail.com";

    public static $is_connect;

    public static function set_name_base($base)
    {
        self::$base = $base;
    }
}

