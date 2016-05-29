<?php
namespace Martine\Helpers;

/**
 * Class Crypto
 * @package Martine\Helpers
 */
class Crypto
{
    /**
     * @var string
     */
    private $appKey;

    /**
     * Crypto constructor.
     * @param string $appKey
     */
    public function __construct(string $appKey)
    {
        $this->appKey = $appKey;
    }

    /**
     * @param string $str
     * @return string
     */
    public function encrypt(string $str): string
    {
        return crypt($str, $this->appKey);
    }

    /**
     * @param string $knowStr
     * @param string $cryptedStr
     * @return bool
     */
    public function equals(string $knowStr, string $cryptedStr): bool
    {
        return hash_equals($knowStr, $cryptedStr);
    }
}
