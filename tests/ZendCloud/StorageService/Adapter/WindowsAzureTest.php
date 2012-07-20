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
use ZendCloud\StorageService\Adapter\WindowsAzure;
use Zend\Config\Config;

/**
 * @category   Zend
 * @package    ZendTest_Cloud_StorageService_Adapter
 * @subpackage UnitTests
 */
class WindowsAzureTest extends TestCase
{
    protected $_clientType = 'ZendService\WindowsAzure\Storage\Blob';

    protected function _getConfig()
    {
        if (!defined('TESTS_ZEND_SERVICE_WINDOWSAZURE_ONLINE_ENABLED')
            || !constant('TESTS_ZEND_SERVICE_WINDOWSAZURE_ONLINE_ENABLED')
            || !defined('TESTS_ZEND_SERVICE_WINDOWSAZURE_ONLINE_ACCOUNTNAME')
            || !defined('TESTS_ZEND_SERVICE_WINDOWSAZURE_ONLINE_ACCOUNTKEY')
            || !defined('TESTS_ZEND_CLOUD_STORAGE_WINDOWSAZURE_CONTAINER')
        ) {
            $this->markTestSkipped("Windows Azure access not configured, skipping test");
        }

        $config = new \Zend\Config\Config(array(
            \ZendCloud\StorageService\Factory::STORAGE_ADAPTER_KEY => 'ZendCloud\StorageService\Adapter\WindowsAzure',
            \ZendCloud\StorageService\Adapter\WindowsAzure::ACCOUNT_NAME => constant('TESTS_ZEND_SERVICE_WINDOWSAZURE_ONLINE_ACCOUNTNAME'),
            \ZendCloud\StorageService\Adapter\WindowsAzure::ACCOUNT_KEY => constant('TESTS_ZEND_SERVICE_WINDOWSAZURE_ONLINE_ACCOUNTKEY'),
            \ZendCloud\StorageService\Adapter\WindowsAzure::HOST => constant('TESTS_ZEND_SERVICE_WINDOWSAZURE_ONLINE_STORAGE_HOST'),
            \ZendCloud\StorageService\Adapter\WindowsAzure::PROXY_HOST => constant('TESTS_ZEND_SERVICE_WINDOWSAZURE_ONLINE_STORAGE_PROXY_HOST'),
            \ZendCloud\StorageService\Adapter\WindowsAzure::PROXY_PORT => constant('TESTS_ZEND_SERVICE_WINDOWSAZURE_ONLINE_STORAGE_PROXY_PORT'),
            \ZendCloud\StorageService\Adapter\WindowsAzure::PROXY_CREDENTIALS => constant('TESTS_ZEND_SERVICE_WINDOWSAZURE_ONLINE_STORAGE_PROXY_CREDENTIALS'),
            \ZendCloud\StorageService\Adapter\WindowsAzure::CONTAINER => constant('TESTS_ZEND_CLOUD_STORAGE_WINDOWSAZURE_CONTAINER'),
        ));

        return $config;
    }
}
