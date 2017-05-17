<?php

namespace Mahmud\MaintenanceMode;


class Config
{
    private static $namespace = "maintenance-mode";
    private static $cookie_exp_min = 1;
    private static $app_status = 'up';
    private static $down_status_code = 503;
    private static $app_down_msg = "Application is down for maintenance";
    private static $view = "maintenance-mode::maintenance-mode";

    public static function getCookieExpMinute(){
        return config(self::$namespace . '.cookie_exp_min', self::$cookie_exp_min);
    }

    public static function getAppStatus(){
        $app_status = config(self::$namespace . '.app_status', env('APP_STATUS'));
        $app_status = $app_status ? $app_status : self::$app_status;
        return $app_status ? $app_status : 'up';
    }

    public static function getDownStatusCode(){
        return config(self::$namespace . '.down_status_code', self::$down_status_code);
    }

    public static function getAppDownMessage(){
        return config(self::$namespace . '.app_down_msg', self::$app_down_msg);
    }

    public static function getView(){
        return config(self::$namespace . '.view', self::$view);
    }
}