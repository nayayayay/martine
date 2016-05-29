<?php
use Martine\Helpers\Crypto;

/**
 * Class CryptoTest
 */
class CryptoTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return Crypto
     */
    public function testCreateCrypto()
    {
        $salt = uniqid(mt_rand(), true);
        return new Crypto($salt);
    }

    /**
     * @param Crypto $crypto
     * @depends testCreateCrypto
     * @return string
     */
    public function testCrypt(Crypto $crypto)
    {
        return $crypto->encrypt('martine');
    }

    /**
     * @param Crypto $crypto
     * @param $cryptedStr
     * @depends testCreateCrypto
     * @depends testCrypt
     */
    public function testEquals(Crypto $crypto, $cryptedStr)
    {
        $this->assertTrue($crypto->equals($crypto->encrypt('martine'), $cryptedStr));
    }
}
