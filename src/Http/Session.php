<?php
namespace Martine\Http;

/**
 * Class Session
 * @package Martine\Http
 */
class Session
{
    /**
     * Session constructor.
     */
    public function __construct()
    {
    }

    /**
     * Get a session data.
     *
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $_SESSION[$key] ?? NULL;
    }

    /**
     * Set or update a session data.
     * 
     * @param string $key
     * @param $value
     * @return void
     */
    public function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get all the available session data.
     * 
     * @return array
     */
    public function getAll(): array
    {
        return $_SESSION;
    }
}
