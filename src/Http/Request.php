<?php
namespace Martine\Http;

/**
 * Class Request
 * @package Martine\Http
 */
class Request
{
    public function __construct()
    {
    }

    public function getMethod(): string
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    public function getRequestTime(): int
    {
        return $_SERVER["REQUEST_TIME"];
    }

    public function getAcceptLanguage(): array
    {
        $acceptLanguages = str_replace(';',',',$_SERVER["HTTP_ACCEPT_LANGUAGE"]);
        $acceptLanguages = explode(',',$acceptLanguages);
        $languages = [];
        foreach ($acceptLanguages as $language) {
            if (strpos($language, 'q=') === false) {
                $languages[] = $language;
            }
        }
        return $languages;
    }

    public function getAcceptEncoding(): array
    {
        $acceptEncoding = str_replace(" ", "",$_SERVER["HTTP_ACCEPT_ENCODING"]);
        $acceptEncoding = explode(',',$acceptEncoding);
        return $acceptEncoding;
    }
}
