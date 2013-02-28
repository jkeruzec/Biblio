<?php

namespace BiblioTest\Model\Ps;

use BiblioModule\Model\Po\UserPO;
use BiblioTest\Bootstrap;
use Doctrine\Common\Annotations\AnnotationReader;
use PHPUnit_Framework_TestCase;



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
	public function testInsertSimlpeUserIntoBaseAndFindIt() {
		
		$userPS = $this->getUserPS();
		
		$user1 = new UserPO();
		$user1->setNom("Keru");
		$userPS->create($user1);
		
		// Commit en base du nouveau PO
		$userPS->commit($user1);
		
		// Validation de l'insertion
		$reflection = new \ReflectionClass($user1);
		$userFound = $userPS->findByID($reflection->getName(), $user1->getId());
		
		$this->assertEquals($user1->getId(), $userFound->getId());
		
		return $user1;
	}
	
	/**
	 * @depends testInsertSimlpeUserIntoBaseAndFindIt
	 * @param UserPO $user1
	 */
	public function testMergeExistingUser($user1) {
		$userPS = $this->getUserPS();
		$user1->setPrenom("Julien");
		$user1 = $userPS->merge($user1);
		$userPS->commit($user1);
	}
	
	/**
	 * 
	 * @return BiblioModule\Model\Ps\UserPS
	 */
	private function getUserPS() {
		return $this->serviceManager->get('BiblioModule\Tech\UserPS');
	}
	
}