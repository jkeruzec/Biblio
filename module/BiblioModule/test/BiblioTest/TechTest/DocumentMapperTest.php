<?php

use BiblioModule\Tech\DocumentMapper;
use BiblioTest\Bootstrap;

/**
 * 
 * @author julien.keruzec
 *
 */
class DocumentMapperTest extends PHPUnit_Framework_TestCase {

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
	 */
	public function testDocumentMapperIsCreated() {
		// Récupération DocumentMapper
		$dm = $this->serviceManager->get('BiblioModule\Tech\DocumentMapper');
		$this->assertNotEquals(NULL, $dm); 
	}
	
	/**
	 * 
	 */
	public function testDocumentMapperIsSingleton() {
		
		$dm1 = $this->serviceManager->get('BiblioModule\Tech\DocumentMapper');
		$dm2 = $this->serviceManager->get('BiblioModule\Tech\DocumentMapper');
		
		$this->assertSame($dm1, $dm2);
	}

}
