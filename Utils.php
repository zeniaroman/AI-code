<?php
declare(strict_types=1);
namespace App\Utils;

// Class utils with different methods
class Utils
{
    // Method to get the current timestamp
    public static function getCurrentTimestamp(): int
    {
        return time();
    }

    // Method to get the current date
    public static function getCurrentDate(): string
    {
        return date('Y-m-d');
    }

    // Method to get the current time
    public static function getCurrentTime(): string
    {
        return date('H:i:s');
    }

    // Method to get the current date and time
    public static function getCurrentDateTime(): string
    {
        return date('Y-m-d H:i:s');
    }

    // Method to get the current date and time in the format of MySQL
    public static function getCurrentDateTimeMySQL(): string
    {
        return date('Y-m-d H:i:s', time());
    }

    // Method to return file content from string $path
    public static function getFileContent(string $path): string
    {
        return file_get_contents($path);
    }

    // Method that returns the current URL
    public static function getCurrentUrl(): string
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'] . '/';
        return $protocol . $domainName;
    }

    // Method that returns the current URL without the query string
    public static function getCurrentUrlWithoutQueryString(): string
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domainName = $_SERVER['HTTP_HOST'] . '/';
        $url = $protocol . $domainName;
        $url = str_replace('?', '', $url);
        return $url;
    }

    // Method that set cookie with the given parameters and the current URL
    public static function setCookie(string $name, string $value, int $expire, string $path, string $domain, bool $secure, bool $httpOnly): void
    {
        setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
    }
}