<?php
namespace BiblioTest\Tech;


/**
 * 
 * @author julien.keruzec
 *
 */
class DocumentMapperTest extends BaseTest {

	
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
	
	
	public function testThatMongoDBConnectionIsReady() {
		$dm = $this->getDocumentMapper();
		$connection = $dm->getConnection();
		$this->assertNotNull($connection);
		$this->assertTrue($connection->isConnected());
	}

}
