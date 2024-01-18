<?php

class Autoload
{
    public function __construct()
    {
        $this->register();
    }

    public  function register()
    {

        spl_autoload_register(function ($class) {
            $file = "source/" . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });
        spl_autoload_register(function ($class) {
            $file = "../source/" . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });
        spl_autoload_register(function ($class) {
            $file = "lib/" . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });
        spl_autoload_register(function ($class) {
            $file = "../lib/" . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });
    }
}
