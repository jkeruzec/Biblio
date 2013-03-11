<?php

namespace BiblioTest\Tech;

use PHPUnit_Framework_TestCase;
use BiblioTest\Bootstrap;
use Zend\Authentication\AuthenticationService;
use Zend\Log\Logger;
use Zend\ServiceManager\ServiceManager;
use BiblioModule\Model\Ps\UserPs;
use Doctrine\ODM\MongoDB\DocumentManager;

class BaseTest extends PHPUnit_Framework_TestCase {
	
	/**
	 *
	 * @var ServiceManager
	 */
	protected $serviceManager;
	
	/**
	 * (non-PHPdoc)
	 * @see PHPUnit_Framework_TestCase::setUp()
	 */
	protected function setUp()
	{
		$this->serviceManager = Bootstrap::getServiceManager();
	}
	
	/**
	 *
	 * @return AuthenticationService
	 */
	protected function getAuthService() {
		return $this->serviceManager->get('AuthService');
	}
	
	/**
	 *
	 * @return UserPS
	 */
	protected function getUserPS() {
		return $this->serviceManager->get('BiblioModule\Tech\UserPS');
	}
	
	/**
	 * @return DocumentManager
	 */
	protected function getDocumentMapper() {
		// Récupération DocumentMapper
		return $this->serviceManager->get('BiblioModule\Tech\DocumentMapper');
	}
	
	/**
	 * @return Logger
	 */
	protected function getLog() {
		return $this->serviceManager->get('Zend\Log');
	}

	/**
	 * 
	 */
	public function testServiceManagerLoaded() {
		$this->assertNotNull($this->serviceManager);
	}
	
}