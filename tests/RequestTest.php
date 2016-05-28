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
        $_SERVER['REQUEST_METHOD'] = 'GET';
        $this->assertEquals($_SERVER['REQUEST_METHOD'], $request->getMethod());
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGetRequestTime(Request $request)
    {
        $this->assertEquals($_SERVER['REQUEST_TIME'], $request->getRequestTime());
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGetAcceptLanguage(Request $request)
    {
        $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'FR-fr,fr;q=0.8,en';
        $this->assertEquals(['FR-fr','fr','en'],$request-> getAcceptLanguage());

        $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'nl,en-gb;q=0.8,en;q=0.6,fr;q=0.4,fr-ca;q=0.2';
        $this->assertEquals(['nl','en-gb','en','fr','fr-ca'], $request->getAcceptLanguage());
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGetAcceptEncoding(Request $request)
    {
        $_SERVER['HTTP_ACCEPT_ENCODING'] = 'gzip, deflate, sdch';
        $this->assertEquals(['gzip', 'deflate', 'sdch'], $request->getAcceptEncoding());
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGetUserAgent(Request $request)
    {
        $_SERVER['HTTP_USER_AGENT'] = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) 
            AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36';
        $this->assertEquals($_SERVER["HTTP_USER_AGENT"], $request->getUserAgent());
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGetReferer(Request $request)
    {
        $_SERVER['HTTP_REFERER'] = 'http://www.martine.com/PHP-7';
        $this->assertEquals('http://www.martine.com/PHP-7',$request->getReferer());
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGetRefererWithoutReferer(Request $request)
    {
        $this->assertNull($request->getReferer());
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGetAcceptContentType(Request $request)
    {
        $_SERVER['HTTP_ACCEPT'] = 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8';
        $this->assertEquals(['text/html','application/xhtml+xml','application/xml','image/webp','*/*'], $request->getAcceptContentType());
    }
}
