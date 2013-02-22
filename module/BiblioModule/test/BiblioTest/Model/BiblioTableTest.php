<?php
namespace BiblioTest\Model;

use BiblioModule\Model\BiblioTable;
use BiblioModule\Model\Biblio;
use Zend\Db\ResultSet\ResultSet;
use PHPUnit_Framework_TestCase;

class BiblioTableTest extends PHPUnit_Framework_TestCase
{
    public function testFetchAllReturnsAllBiblios()
    {
        $resultSet        = new ResultSet();
        $mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway', array('select'), array(), '', false);
        $mockTableGateway->expects($this->once())
                         ->method('select')
                         ->with()
                         ->will($this->returnValue($resultSet));

        $BiblioTable = new BiblioTable($mockTableGateway);

        $this->assertSame($resultSet, $BiblioTable->fetchAll());
    }
    
    public function testCanRetrieveAnBiblioByItsId()
    {
    	$Biblio = new Biblio();
    	$Biblio->exchangeArray(array('id'     => 123,
    			'artist' => 'The Military Wives',
    			'title'  => 'In My Dreams'));
    
    	$resultSet = new ResultSet();
    	$resultSet->setArrayObjectPrototype(new Biblio());
    	$resultSet->initialize(array($Biblio));
    
    	$mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway', array('select'), array(), '', false);
    	$mockTableGateway->expects($this->once())
    	->method('select')
    	->with(array('id' => 123))
    	->will($this->returnValue($resultSet));
    
    	$BiblioTable = new BiblioTable($mockTableGateway);
    
    	$this->assertSame($Biblio, $BiblioTable->getBiblio(123));
    }
    
    public function testCanDeleteAnBiblioByItsId()
    {
    	$mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway', array('delete'), array(), '', false);
    	$mockTableGateway->expects($this->once())
    	->method('delete')
    	->with(array('id' => 123));
    
    	$BiblioTable = new BiblioTable($mockTableGateway);
    	$BiblioTable->deleteBiblio(123);
    }
    
    public function testSaveBiblioWillInsertNewBibliosIfTheyDontAlreadyHaveAnId()
    {
    	$BiblioData = array('artist' => 'The Military Wives', 'title' => 'In My Dreams');
    	$Biblio     = new Biblio();
    	$Biblio->exchangeArray($BiblioData);
    
    	$mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway', array('insert'), array(), '', false);
    	$mockTableGateway->expects($this->once())
    	->method('insert')
    	->with($BiblioData);
    
    	$BiblioTable = new BiblioTable($mockTableGateway);
    	$BiblioTable->saveBiblio($Biblio);
    }
    
    public function testSaveBiblioWillUpdateExistingBibliosIfTheyAlreadyHaveAnId()
    {
    	$BiblioData = array('id' => 123, 'artist' => 'The Military Wives', 'title' => 'In My Dreams');
    	$Biblio     = new Biblio();
    	$Biblio->exchangeArray($BiblioData);
    
    	$resultSet = new ResultSet();
    	$resultSet->setArrayObjectPrototype(new Biblio());
    	$resultSet->initialize(array($Biblio));
    
    	$mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway',
    			array('select', 'update'), array(), '', false);
    	$mockTableGateway->expects($this->once())
    	->method('select')
    	->with(array('id' => 123))
    	->will($this->returnValue($resultSet));
    	$mockTableGateway->expects($this->once())
    	->method('update')
    	->with(array('artist' => 'The Military Wives', 'title' => 'In My Dreams'),
    			array('id' => 123));
    
    	$BiblioTable = new BiblioTable($mockTableGateway);
    	$BiblioTable->saveBiblio($Biblio);
    }
    
    public function testExceptionIsThrownWhenGettingNonexistentBiblio()
    {
    	$resultSet = new ResultSet();
    	$resultSet->setArrayObjectPrototype(new Biblio());
    	$resultSet->initialize(array());
    
    	$mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway', array('select'), array(), '', false);
    	$mockTableGateway->expects($this->once())
    	->method('select')
    	->with(array('id' => 123))
    	->will($this->returnValue($resultSet));
    
    	$BiblioTable = new BiblioTable($mockTableGateway);
    
    	try
    	{
    		$BiblioTable->getBiblio(123);
    	}
    	catch (\Exception $e)
    	{
    		$this->assertSame('Could not find row 123', $e->getMessage());
    		return;
    	}
    
    	$this->fail('Expected exception was not thrown');
    }
}