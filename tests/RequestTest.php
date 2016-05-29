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
        $this->assertEquals(['FR-fr', 'fr', 'en'], $request->getAcceptLanguage());

        $_SERVER['HTTP_ACCEPT_LANGUAGE'] = 'nl,en-gb;q=0.8,en;q=0.6,fr;q=0.4,fr-ca;q=0.2';
        $this->assertEquals(['nl', 'en-gb', 'en', 'fr', 'fr-ca'], $request->getAcceptLanguage());
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
        $this->assertEquals('http://www.martine.com/PHP-7', $request->getReferer());
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
        $this->assertEquals(['text/html', 'application/xhtml+xml', 'application/xml', 'image/webp', '*/*'], $request->getAcceptContentType());
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGetQueryString(Request $request)
    {
        $_SERVER['QUERY_STRING'] = 'framework=martine&php=7';
        $this->assertEquals('framework=martine&php=7', $request->getQueryString());
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGetRemoteIp(Request $request)
    {
        $_SERVER['REMOTE_ADDR'] = '::1';
        $this->assertEquals('::1', $request->getRemoteIp());
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGetRemotePort(Request $request)
    {
        $_SERVER['REMOTE_PORT'] = '56475';
        $this->assertEquals('56475', $request->getRemotePort());
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGetServerSoftware(Request $request)
    {
        $_SERVER['SERVER_SOFTWARE'] = 'Apache/2.2.29 (Unix) mod_wsgi/3.5 Python/2.7.10 PHP/7.0.0 ';
        $this->assertEquals('Apache/2.2.29 (Unix) mod_wsgi/3.5 Python/2.7.10 PHP/7.0.0 ', $request->getServerSoftware());
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGetServerProtocol(Request $request)
    {
        $_SERVER['SERVER_PROTOCOL'] = 'HTTP/1.1';
        $this->assertEquals('HTTP/1.1', $request->getServerProtocol());
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGetHttpConnection(Request $request)
    {
        $_SERVER['HTTP_CONNECTION'] = 'keep-alive';
        $this->assertEquals('keep-alive', $request->getHttpConnection());
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGet(Request $request)
    {
        $_GET['framework'] = 'martine';
        $_GET['php'] = '7.0';
        $this->assertEquals('martine', $request->get('framework'));
        $this->assertEquals('7.0', $request->get('php'));
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testGetNotExist(Request $request)
    {
        $this->assertNull($request->get('Failed'));
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testPost(Request $request)
    {
        $_POST['framework'] = 'martine';
        $_POST['php'] = '7.0';
        $this->assertEquals('martine', $request->post('framework'));
        $this->assertEquals('7.0', $request->post('php'));
    }

    /**
     * @param Request $request
     * @depends testCreateRequest
     */
    public function testPostNotExist(Request $request)
    {
        $this->assertNull($request->post('failed'));
    }
}
