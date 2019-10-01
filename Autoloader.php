<?php


class Autoloader
{
    public static function register()
    {
        spl_autoload_register(function ($class_name) {

            $dirs = array(
                'Controllers/',
                'Models/Manager/',

            );
            foreach ($dirs as $dir) {
                if (file_exists($dir . $class_name . '.php')) {
                    require_once($dir . $class_name . '.php');
                    return;
                }
            }
        });
    }
}
