<?php

namespace BiblioTest\Tech;

use BiblioModule\Model\Po\UserPO;
use Zend\Authentication\AuthenticationService;

class DoctrineAuthAdapterTest extends BaseTest {
		
	public function testAuthentificationService() {
		
		$authService = $this->getAuthService();
		
		$authService->getAdapter()->setIdentity('Keru');
		$authService->getAdapter()->setCredential('password');
		$authService->getAdapter()->setUserPs($this->getUserPS());
		
		$result = $authService->authenticate();
		
		$this->assertTrue($result->isValid());
		
		$authService->getStorage()->
		
		
		$authService->getAdapter()->setIdentity('Keru');
		$authService->getAdapter()->setCredential('a');
		$authService->getAdapter()->setUserPs($this->getUserPS());
		
		$result = $authService->authenticate();
		
		$this->assertTrue(!$result->isValid());
		
		
	}
	
	
}