<?php

use BiblioModule\Tech\DocumentMapper;
use BiblioTest\Bootstrap;

class DocumentMapperTest extends PHPUnit_Framework_TestCase {

	
	protected $serviceManager;
	
	protected function setUp()
	{
		$this->serviceManager = Bootstrap::getServiceManager();
	}
	
	public function testCreationDocumentMapper() {
		// Récupération DocumentMapper
		$dm = $this->serviceManager->get('BiblioModule\Tech\DocumentMapper');
		$this->assertNotEquals(NULL, $dm); 
	}
	
	public function testSingletonDocumentMapper() {
		
		$dm1 = $this->serviceManager->get('BiblioModule\Tech\DocumentMapper');
		$dm2 = $this->serviceManager->get('BiblioModule\Tech\DocumentMapper');
		
		$this->assertSame($dm1, $dm2);
	}
	

}
