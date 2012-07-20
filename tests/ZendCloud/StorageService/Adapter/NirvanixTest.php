<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/zf2 for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 * @package   Zend_Cloud
 */

namespace ZendCloudTest\StorageService\Adapter;

use ZendCloudTest\StorageService\TestCase;
use ZendCloud\StorageService\Adapter\Nirvanix;
use Zend\Config\Config;

/**
 * @category   Zend
 * @package    ZendTest_Cloud_StorageService_Adapter
 * @subpackage UnitTests
 */
class NirvanixTest extends TestCase
{
    protected $_clientType = 'ZendService\Nirvanix';

    public function testFetchItemStream()
    {
        // The Nirvanix client library doesn't support streams
        $this->markTestSkipped('The Nirvanix client library doesn\'t support streams.');
    }

    public function testStoreItemStream()
    {
        // The Nirvanix client library doesn't support streams
        $this->markTestSkipped('The Nirvanix client library doesn\'t support streams.');
    }

    /**
     * Sets up this test case
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->_waitPeriod = 5;
    }

    protected function _getConfig()
    {
        if (!defined('TESTS_ZEND_SERVICE_NIRVANIX_ONLINE_ENABLED')
            || !constant('TESTS_ZEND_SERVICE_NIRVANIX_ONLINE_ENABLED')
            || !defined('TESTS_ZEND_SERVICE_NIRVANIX_ONLINE_USERNAME')
            || !defined('TESTS_ZEND_SERVICE_NIRVANIX_ONLINE_ACCESSKEY')
            || !defined('TESTS_ZEND_SERVICE_NIRVANIX_ONLINE_PASSWORD')
            || !defined('TESTS_ZEND_CLOUD_STORAGE_NIRVANIX_DIRECTORY')
        ) {
            $this->markTestSkipped("Nirvanix access not configured, skipping test");
        }

        $config = new \Zend\Config\Config(array(
            \ZendCloud\StorageService\Factory::STORAGE_ADAPTER_KEY       => 'ZendCloud\StorageService\Adapter\Nirvanix',
            \ZendCloud\StorageService\Adapter\Nirvanix::USERNAME         => constant('TESTS_ZEND_SERVICE_NIRVANIX_ONLINE_USERNAME'),
            \ZendCloud\StorageService\Adapter\Nirvanix::APP_KEY          => constant('TESTS_ZEND_SERVICE_NIRVANIX_ONLINE_ACCESSKEY'),
            \ZendCloud\StorageService\Adapter\Nirvanix::PASSWORD         => constant('TESTS_ZEND_SERVICE_NIRVANIX_ONLINE_PASSWORD'),
            \ZendCloud\StorageService\Adapter\Nirvanix::REMOTE_DIRECTORY => constant('TESTS_ZEND_CLOUD_STORAGE_NIRVANIX_DIRECTORY'),
        ));

        return $config;
    }
}
