<?php
declare(strict_types=1);
namespace App\Controller;

// Abstract Registry class with the abstract methods get and set and the private property $instance and public method getInstance  
abstract class RegistryAbstract
{
    private static $instance;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new static;
        }

        return self::$instance;
    }

    abstract public function get($key);
    abstract public function set($key, $value);
}