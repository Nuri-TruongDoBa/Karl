<?php

declare(strict_types=1);

namespace Inc;

use Inc\Registry;

class Redirect
{
    protected static $secret = 'nuri@$&11041998';
    protected static $baseUrl = null;

    public function __construct()
    {
        static::$baseUrl = Registry::getInstance()->config;
    }

    public function generateRedirect($url)
    {
        $hash = md5($this->secret . $url);
        $url = urlencode($url);

        return static::$baseUrl . "?url=" . $url . "&key=" . $hash;
    }

    public function redirect()
    {
        @$hash = $_GET['key'];
        @$url = $_GET['url'];
        if (md5($this->secret . $url) !== $hash) {
            header("HTTP/1.1 403 Forbidden");
            die();
        }

        $ref = $_SERVER['HTTP_REFERER'];
        if (self::urlExists($url)) {
            header("HTTP/1.1 301 Moved Permanently");
            header("Location: " . $url);
            die();
        } else {
            header("HTTP/1.1 301 Moved Permanently");
            header("Refresh:2; url=$ref");
            echo "<h1>Error:</h1>Sorry, the page link is no longer valid, and you will be returned the referring page in a moment.";
            die();
        }

        return true;
    }

    private static function urlExists($url)
    {
        $test = false;
        @$dns = parse_url($url);
        @$dns = dns_get_record($dns['host']);
        if (@$dns[0]) $test = true;

        return $test;
    }
}
