<?php

namespace BiblioTest\Tech;

use BiblioModule\Model\Po\UserPO;

class DoctrineAuthAdapterTest extends BaseTest {
		
	public function testAuthentificationService() {
		
		$authService = $this->getAuthService();
		
		$authService->getAdapter()->setIdentity('Keru');
		$authService->getAdapter()->setCredential('password');
		$authService->getAdapter()->setUserPs($this->getUserPS());
		
		$result = $authService->authenticate();

		$this->assertTrue($result->isValid());

		foreach ($result->getMessages() as $message) {
			$this->getLog()->debug($message);
		}
		
		$authService->getAdapter()->setIdentity('Keru');
		$authService->getAdapter()->setCredential('a');
		$authService->getAdapter()->setUserPs($this->getUserPS());
		
		$result = $authService->authenticate();
		
		$this->assertTrue(!$result->isValid());
		
		foreach ($result->getMessages() as $message) {
			$this->getLog()->debug($message);
		}
		
	}
	
	
}