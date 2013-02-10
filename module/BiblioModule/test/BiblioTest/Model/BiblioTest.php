<?php
namespace BiblioTest\Model;

use Biblio\Model\Biblio;
use PHPUnit_Framework_TestCase;

class BiblioTest extends PHPUnit_Framework_TestCase {
	
	public function testBiblioInitialState()
	{
		$Biblio = new Biblio();
	
		$this->assertNull($Biblio->artist, '"artist" should initially be null');
		$this->assertNull($Biblio->id, '"id" should initially be null');
		$this->assertNull($Biblio->title, '"title" should initially be null');
	}
	
	public function testExchangeArraySetsPropertiesCorrectly()
	{
		$Biblio = new Biblio();
		$data  = array('artist' => 'some artist',
				'id'     => 123,
				'title'  => 'some title');
	
		$Biblio->exchangeArray($data);
	
		$this->assertSame($data['artist'], $Biblio->artist, '"artist" was not set correctly');
		$this->assertSame($data['id'], $Biblio->id, '"id" was not set correctly');
		$this->assertSame($data['title'], $Biblio->title, '"title" was not set correctly');
	}
	
	public function testExchangeArraySetsPropertiesToNullIfKeysAreNotPresent()
	{
		$Biblio = new Biblio();
	
		$Biblio->exchangeArray(array('artist' => 'some artist',
				'id'     => 123,
				'title'  => 'some title'));
		$Biblio->exchangeArray(array());
	
		$this->assertNull($Biblio->artist, '"artist" should have defaulted to null');
		$this->assertNull($Biblio->id, '"id" should have defaulted to null');
		$this->assertNull($Biblio->title, '"title" should have defaulted to null');
	}
	
}