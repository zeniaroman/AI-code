<?php
declare(strict_types=1);
namespace App\Controller;

// Class that handles the request
class RequestHelper
{
    // Method to get the request method
    public static function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    // Method to get the request URI
    public static function getUri(): string
    {
        return $_SERVER['REQUEST_URI'];
    }

    // Method to get the request body
    public static function getBody(): string
    {
        return file_get_contents('php://input');
    }

    // Method to get the request headers
    public static function getHeaders(): array
    {
        $headers = [];

        foreach ($_SERVER as $key => $value) {
            if (substr($key, 0, 5) == 'HTTP_') {
                $key = substr($key, 5);
                $key = str_replace('_', ' ', $key);
                $key = str_replace(' ', '-', $key);
                $key = strtolower($key);
                $headers[$key] = $value;
            }
        }

        return $headers;
    }
}