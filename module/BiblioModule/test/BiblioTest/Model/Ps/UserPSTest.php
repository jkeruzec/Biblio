<?php

use BiblioModule\Model\Po\UserPO;

use BiblioTest\Bootstrap;
use BiblioModule\Model\Ps\UserPS;

class UserPSTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * 
	 * @var Zend\ServiceManager\ServiceManager
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
	 */
	public function testgetServiceLocatorIsNotNull() {
		$userPS = $this->getUserPS();
		$this->assertNotNull($userPS->getServiceLocator());
	}
	
	/**
	 * 
	 * @return \BiblioModule\Model\Po\UserPO
	 */
	public function testInsertSimlpeUserIntoBase() {
		$userPS = $this->getUserPS();
		$user1 = new UserPO();
		$user1->setNom("Keru");
		$userPS->create($user1);
		$userPS->commit($user1);
		return $user1;
	}
	
	/**
	 * @depends testInsertSimlpeUserIntoBase
	 * @param unknown $user1
	 */
	public function testMergeExistingUser($user1) {
		$userPS = $this->getUserPS();
		$user1->setPrenom("Julien");
		$user1 = $userPS->merge($user1);
		$userPS->commit($user1);
	}
	
	/**
	 * 
	 * @return Ambigous <object, multitype:, NULL, \Zend\ServiceManager\mixed, boolean, mixed>
	 */
	private function getUserPS() {
		return $this->serviceManager->get('BiblioModule\Tech\UserPS');
	}
	
}