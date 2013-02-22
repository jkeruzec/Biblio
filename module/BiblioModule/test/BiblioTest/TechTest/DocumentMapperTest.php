<?php

use BiblioModule\Tech\DocumentMapper;

class DocumentMapperTest extends PHPUnit_Framework_TestCase {


	public function testCreationDocumentMapper() {
		// Récupération DocumentMapper
		$dm = DocumentMapper::getInstanceDocumentMapper();
		$this->assertNotEquals(NULL, $dm); 
	}
	
	public function testSingletonDocumentMapper() {
		
		$dm1 = DocumentMapper::getInstanceDocumentMapper();
		$dm2 = DocumentMapper::getInstanceDocumentMapper();
		
		$this->assertSame($dm1, $dm2);
		
	}
	

}
