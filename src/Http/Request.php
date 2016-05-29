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
     * @return string
     */
    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return int
     */
    public function getRequestTime(): int
    {
        return $_SERVER['REQUEST_TIME'];
    }

    /**
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
     * @return array
     */
    public function getAcceptEncoding(): array
    {
        $acceptEncoding = str_replace(' ', '', $_SERVER['HTTP_ACCEPT_ENCODING']);
        $acceptEncoding = explode(',', $acceptEncoding);

        return $acceptEncoding;
    }

    /**
     * @return string
     */
    public function getUserAgent(): string
    {
        return $_SERVER['HTTP_USER_AGENT'];
    }

    /**
     * @return mixed
     */
    public function getReferer()
    {
        return $_SERVER['HTTP_REFERER'] ?? NULL;
    }

    /**
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
     * @return string
     */
    public function getQueryString(): string
    {
        return $_SERVER['QUERY_STRING'];
    }

    /**
     * @return string
     */
    public function getRemoteIp(): string
    {
        return $_SERVER['REMOTE_ADDR'];
    }

    /**
     * @return string
     */
    public function getRemotePort(): string
    {
        return $_SERVER['REMOTE_PORT'];
    }

    /**
     * @return string
     */
    public function getServerSoftware(): string
    {
        return $_SERVER['SERVER_SOFTWARE'];
    }

    /**
     * @return string
     */
    public function getServerProtocol(): string
    {
        return $_SERVER['SERVER_PROTOCOL'];
    }

    /**
     * @return string
     */
    public function getHttpConnection(): string
    {
        return $_SERVER['HTTP_CONNECTION'];
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key)
    {
        return $_GET[$key] ?? NULL;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function post(string $key)
    {
        return $_POST[$key] ?? NULL;
    }
}
