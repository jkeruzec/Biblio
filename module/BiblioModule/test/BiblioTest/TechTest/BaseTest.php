<?php

namespace BiblioTest\Tech;

use PHPUnit_Framework_TestCase;
use BiblioTest\Bootstrap;

class BaseTest extends PHPUnit_Framework_TestCase {
	
	/**
	 *
	 * @var unknown
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
	 * @return Zend\Authentication\AuthenticationService
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
	 * 
	 */
	public function testServiceManagerLoaded() {
		$this->assertNotNull($this->serviceManager);
	}
	
	
}