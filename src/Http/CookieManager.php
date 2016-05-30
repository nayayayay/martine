<?php
namespace Martine\Http;

/**
 * Class Cookie
 * @package Martine\Http
 */
class CookieManager
{
    /**
     * Cookie constructor.
     */
    public function __construct()
    {
    }

    /**
     * Get a cookie from its key.
     * 
     * @param string $key
     * @return string
     */
    public function get(string $key): string
    {
        return $_COOKIE[$key] ?? NULL;
    }

    /**
     * Set a new cookie.
     *
     * @param string $key
     * @param string $value optional
     * @param int $expire optional
     * @param string $domain optional
     * @param bool $secure optional
     * @param bool $httponly optional
     * @return bool
     */
    public function set(string $key, string $value = '', int $expire = 0, string $domain = '/',
                        bool $secure = false, bool $httponly = false): bool
    {
        return setcookie($key, $value, $expire, $domain, $secure, $httponly);
    }

    /**
     * Get all the cookies as an array.
     * 
     * @return array
     */
    public function getAll(): array
    {
        return $_COOKIE;
    }
}
