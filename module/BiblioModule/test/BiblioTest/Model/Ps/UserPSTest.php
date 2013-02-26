<?php

use BiblioModule\Model\Ps\UserPS;

class UserPSTest extends PHPUnit_Framework_TestCase {
	
	
	
	public function testgetServiceLocatorIsNotNull() {
		
		$userPS = new UserPS();
		$this->assertNotNull($userPS->getServiceLocator());
		
		
		
	}
	
	
	
	
}