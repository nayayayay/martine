<?php
use Martine\Http\Request;

/**
 * Class RequestTest
 */
class RequestTest extends PHPUnit_Framework_TestCase
{
    /**
     * @return Request
     */
    public function testCreateRequest()
    {
        return new Request();
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGetMethod(Request $request)
    {
        $_SERVER["REQUEST_METHOD"] = "GET";
        $this->assertEquals($_SERVER["REQUEST_METHOD"], $request->getMethod());
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGetRequestTime(Request $request)
    {
        $this->assertEquals($_SERVER["REQUEST_TIME"], $request->getRequestTime());
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGetAcceptLanguage(Request $request)
    {
        $_SERVER["HTTP_ACCEPT_LANGUAGE"] = 'FR-fr,fr;q=0.8,en';
        $this->assertEquals(['FR-fr','fr','en'],$request-> getAcceptLanguage());

        $_SERVER["HTTP_ACCEPT_LANGUAGE"] = 'nl,en-gb;q=0.8,en;q=0.6,fr;q=0.4,fr-ca;q=0.2';
        $this->assertEquals(['nl','en-gb','en','fr','fr-ca'], $request->getAcceptLanguage());
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGetAcceptEncoding(Request $request)
    {
        $_SERVER["HTTP_ACCEPT_ENCODING"] = 'gzip, deflate, sdch';
        $this->assertEquals(['gzip', 'deflate', 'sdch'], $request->getAcceptEncoding());
    }
}
