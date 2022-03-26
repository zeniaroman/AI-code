<?php
declare(strict_types=1);
namespace App\Controller;

/**
 * Class ApplicationRegistry
 *  - Class that extends the RegistryAbstract class with methods to get and set the application registry
 * - The application registry is a singleton that holds the application configuration
 * @package App\Controller
 */
class ApplicationRegistry extends RegistryAbstract
{
    private static $instance;

    private $config;

    private function __construct()
    {
        $this->config = require __DIR__ . '/../../config/config.php';
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new static;
        }

        return self::$instance;
    }

    public function get($key)
    {
        if (isset($this->config[$key])) {
            return $this->config[$key];
        }

        return null;
    }

    public function set($key, $value)
    {
        $this->config[$key] = $value;
    }

    // Method to prepare JSON config file for the application
    public function prepareConfig()
    {
        $config = [];

        foreach ($this->config as $key => $value) {
            if (is_array($value)) {
                $config[$key] = [];

                foreach ($value as $subKey => $subValue) {
                    $config[$key][$subKey] = $subValue;
                }
            } else {
                $config[$key] = $value;
            }
        }

        return json_encode($config, JSON_PRETTY_PRINT);
    }
}