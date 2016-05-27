<?php
use Martine\Http\Session;

/**
 * Class SessionTest
 */
class SessionTest extends PHPUnit_Framework_TestCase
{
    
    public function seedSession()
    {
        // Seed the Session array
        $_SESSION['unicorn'] = 'yes';
        $_SESSION['foofoo'] = 'no';
    }
    
    /**
     * @return Session
     */
    public function testCreateSession()
    {
        return new Session();
    }

    /**
     * @param Session $session
     * @depends testCreateSession
     */
    public function testGetSessionData(Session $session)
    {
        $this->seedSession();
        
        $this->assertNull($session->get('foobar'));
        $this->assertEquals($session->get('unicorn'), 'yes');
    }

    /**
     * @param Session $session
     * @depends testCreateSession
     */
    public function testSetSessionData(Session $session)
    {
        $session->set('simon', 'rocks at PHP');
        $this->assertEquals($session->get('simon'), 'rocks at PHP');
    }

    /**
     * @params Session $session
     * @depends testCreateSession
     */
    public function testGetAllSessionData(Session $session)
    {
        $this->seedSession();
        
        $this->assertEquals($session->getAll(), [
            'unicorn' => 'yes',
            'foofoo' => 'no'
        ]);
    }
}
