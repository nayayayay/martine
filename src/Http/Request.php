<?php
namespace Martine\Http;

/**
 * Class Request
 * @package Martine\Http
 */
class Request
{
    /**
     * Request constructor.
     */
    public function __construct()
    {
    }

    /**
     * Get Server Request Method
     * 
     * @return string
     */
    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Get Request Time
     * 
     * @return int
     */
    public function getRequestTime(): int
    {
        return $_SERVER['REQUEST_TIME'];
    }

    /**
     * Get Accept Language
     * 
     * @return array
     */
    public function getAcceptLanguage(): array
    {
        $acceptLanguages = str_replace(';', ',', $_SERVER['HTTP_ACCEPT_LANGUAGE']);
        $acceptLanguages = explode(',', $acceptLanguages);
        $languages = [];
        foreach ($acceptLanguages as $language) {
            if (strpos($language, 'q=') === false) {
                $languages[] = $language;
            }
        }

        return $languages;
    }

    /**
     * Get Accept Encoding
     * 
     * @return array
     */
    public function getAcceptEncoding(): array
    {
        $acceptEncoding = str_replace(' ', '', $_SERVER['HTTP_ACCEPT_ENCODING']);
        $acceptEncoding = explode(',', $acceptEncoding);

        return $acceptEncoding;
    }

    /**
     * Get User Agent
     * 
     * @return string
     */
    public function getUserAgent(): string
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    /**
     * Get Referer link if exist
     * 
     * @return mixed
     */
    public function getReferer()
    {
        return $_SERVER['HTTP_REFERER'] ?? NULL;
    }

    /**
     * Get Accept Content Type
     * 
     * @return array
     */
    public function getAcceptContentType(): array
    {
        $acceptContentType = str_replace(';', ',', $_SERVER['HTTP_ACCEPT']);
        $acceptContentType = explode(',', $acceptContentType);
        $ContentType = [];
        foreach ($acceptContentType as $content) {
            if (strpos($content, 'q=') === false) {
                $ContentType[] = $content;
            }
        }

        return $ContentType;
    }

    /**
     * Get Query String
     * 
     * @return string
     */
    public function getQueryString(): string
    {
        return $_SERVER['QUERY_STRING'];
    }

    /**
     * Get Remote Ip
     * 
     * @return string
     */
    public function getRemoteIp(): string
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * Get Remote Port
     * 
     * @return string
     */
    public function getRemotePort(): string
    {
        return $_SERVER['REMOTE_PORT'];
    }

    /**
     * Get Server Software
     * 
     * @return string
     */
    public function getServerSoftware(): string
    {
        return $_SERVER['SERVER_SOFTWARE'];
    }

    /**
     * Get Server Protocol
     * 
     * @return string
     */
    public function getServerProtocol(): string
    {
        return $_SERVER['SERVER_PROTOCOL'];
    }

    /**
     * Get Http Connection
     * 
     * @return string
     */
    public function getHttpConnection(): string
    {
        return $_SERVER['HTTP_CONNECTION'];
    }

    /**
     * Get a get parameter
     * 
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $_GET[$key] ?? NULL;
    }

    /**
     * Get a post parameter  
     *
     * @param string $key
     * @return mixed
     */
    public function post(string $key)
    {
        return $_POST[$key] ?? NULL;
    }
}
