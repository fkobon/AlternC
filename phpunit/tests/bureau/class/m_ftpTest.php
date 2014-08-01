<?php
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.1 on 2014-03-13 at 15:55:58.
 */
class m_ftpTest extends AlterncTest
{
    /**
     * @var m_ftp
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->object = new m_ftp;
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    public function getDataSet()
    {  $t=array("1" => "ftp/ftp.yml",
            "2" => "membres.yml",
            "3" => "domaines.yml",
            "3" => "policy.yml",
            "4" => "default-quota.yml",
            "5" => "db_servers.yml"
            );

    return parent::loadDataSet($t);
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @covers m_ftp::alternc_password_policy
     * @todo   Implement testAlternc_password_policy().
     */
    public function testAlternc_password_policy()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
                );
    }

    /**
     * @covers m_ftp::hook_menu
     * @todo   Implement testHook_menu().
     */
    public function testHook_menu()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
                );
    }

    /**
     * @covers m_ftp::authip_class
     * @todo   Implement testAuthip_class().
     */
    public function testAuthip_class()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
                );
    }

    /**
     * @covers m_ftp::switch_enabled
     * @todo   Implement testSwitch_enabled().
     */
    public function testSwitch_enabled()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
                );
    }

    /**
     * @covers m_ftp::get_list
     * @todo   Implement testGet_list().
     */
    public function testGet_list()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
                );
    }

    /**
     * @covers m_ftp::get_ftp_details
     * @todo   Implement testGet_ftp_details().
     */
    public function testGet_ftp_details()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
                );
    }

    /**
     * @covers m_ftp::prefix_list
     * @todo   Implement testPrefix_list().
     */
    public function testPrefix_list()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
                );
    }

    /**
     * @covers m_ftp::check_login
     * @todo   Implement testCheck_login().
     */
    public function testCheck_login()
    {
        // Allowed
        $this->assertTrue($this->object->check_login('plop')); 
        $this->assertTrue($this->object->check_login('00')); 

        // Forbidden
        $this->assertFalse($this->object->check_login('_plop')); 
        $this->assertFalse($this->object->check_login('arf+')); 
    }

    /**
     * @covers m_ftp::select_prefix_list
     * @todo   Implement testSelect_prefix_list().
     */
    public function testSelect_prefix_list()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
                );
    }

    /**
     * @covers m_ftp::put_ftp_details
     * @todo   Implement testPut_ftp_details().
     */
    public function testPut_ftp_details()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
                );
    }

    /**
     * @covers m_ftp::delete_ftp
     * @todo   Implement testDelete_ftp().
     */
    public function testDelete_ftp()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
                );
    }

    /**
     * @covers m_ftp::add_ftp
     */
    public function testAdd_ftp_prefix_ok()
    {
        global $db,$mysql,$cuid,$mem,$admin ;
        // we go super-admin
        $admin->enabled=1;
        $mem->su("2001");
        $queryTable               = $this->getConnection()->createQueryTable('domain', 'SELECT * FROM db_servers');
        $row_count = $queryTable->getRowCount();

        #first ftp account 
        $result=$this->object->add_ftp("phpunit","","123456","/");
        $this->assertTrue($result);
        
        #first ftp account again ( should fail )
        $result=$this->object->add_ftp("phpunit","","123456","/");
        $this->assertFalse($result);
        
        #ftp account with suffix
        $result=$this->object->add_ftp("phpunit","new","123456","/");
        $this->assertTrue($result);
        
        #ftp account with suffix again should fail
        $result=$this->object->add_ftp("phpunit","new","123456","/");
        $this->assertFalse($result);

        #ftp account with domain prefix ok 
        $result=$this->object->add_ftp("domain1.tld","","123456","/");
        $this->assertFalse($result);

        #ftp account with domain prefix again : should fail 
        $result=$this->object->add_ftp("domain1.tld","","123456","/");
        $this->assertFalse($result);
    }
    
    /**
     * @covers m_ftp::add_ftp
     */
    public function testAdd_ftp_prefix_not_ok()
    {
        global $db,$mysql,$cuid,$mem,$admin ;
        // we go super-admin
        $admin->enabled=1;
        $mem->su("2001");

        #test with a prefix that is not the user's login
        $result=$this->object->add_ftp("phpunity","","123456","/");
        $this->assertFalse($result);

        #test with a prefix that is not a domain associated to the specified user
        $result=$this->object->add_ftp("admin.ltd","","123456","/");
        $this->assertFalse($result);

    }


    /**
     * @covers m_ftp::is_ftp
     * @todo   Implement testIs_ftp().
     */
    public function testIs_ftp()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
                );
    }

    /**
     * @covers m_ftp::alternc_del_domain
     * @todo   Implement testAlternc_del_domain().
     */
    public function testAlternc_del_domain()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
                );
    }

    /**
     * @covers m_ftp::alternc_del_member
     * @todo   Implement testAlternc_del_member().
     */
    public function testAlternc_del_member()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
                );
    }

    /**
     * @covers m_ftp::hook_quota_get
     * @todo   Implement testHook_quota_get().
     */
    public function testHook_quota_get()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
                );
    }

    /**
     * @covers m_ftp::alternc_export_conf
     * @todo   Implement testAlternc_export_conf().
     */
    public function testAlternc_export_conf()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
                'This test has not been implemented yet.'
                );
    }

    /**
     * @covers m_ftp::hook_upnp_list
     * @todo   Implement testHook_upnp_list().
     */
    public function testHook_upnp_list()
    {
        $this->assertArrayHasKey('ftp', $this->object->hook_upnp_list());
    }
}
