<?php

namespace BiblioTest\Model\Ps;

use BiblioModule\Model\Po\UserPO;
use BiblioTest\Bootstrap;
use Doctrine\Common\Annotations\AnnotationReader;
use PHPUnit_Framework_TestCase;
use BiblioModule\Model\Ps\UserPS;
use BiblioTest\Tech\BaseTest;

/**
 * Classe de test de la couche persistence service pour l'entité User
 * @author julien.keruzec
 *
 */
class UserPSTest extends BaseTest {
	
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
		$user1->setMotDePasse("password");
		$userPS->create($user1);
		
		// Commit en base du nouveau PO
		$userPS->commit($user1);
		
		// Validation de l'insertion
		$userFound = $userPS->findByID($user1->getRepositoryName(), $user1->getId());
		
		$this->assertEquals($user1->getId(), $userFound->getId());
		
		return $user1;
		
	}
	
	/**
	 * @depends testInsertSimlpeUserIntoBaseAndFindIt
	 * @param UserPO $user1
	 */
	public function testMergeExistingUserIntoBaseAndFindIt(UserPO $user1) {
		$userPS = $this->getUserPS();
		$user1->setPrenom("Julien");
		$user1 = $userPS->merge($user1);
		$userPS->commit($user1);
		
		
		// Validation de l'update
		$userFound = $userPS->findByID($user1->getRepositoryName(), $user1->getId());
		
		// Vérifie que l'objet persister est le même qu'avant et qu'il a été updaté
		$this->assertEquals($user1->getId(), $userFound->getId());
		$this->assertEquals($user1->getPrenom(), $userFound->getPrenom());
		
	}
	
	/**
	 * Retrouve un utilisateur par son nom et mot de passe hashé MD5 simple
	 * Test si le user exists
	 */
	public function testFindUserWithNomAndMotDePasse() {
		
		// User Service
		$userPS = $this->getUserPS();
		
		// Creation du User à trouver
		$user = new UserPO();
		$user->setNom("Keru");
		$user->setMotDePasse("password");
		
		// On cherche l'utilisateur
		$cursor = $userPS->findByNomAndPassword($user);
		
		$nbResult = 0;
		
		foreach($cursor as $userFound) {
			$nbResult++;
			$this->assertEquals($userFound->getNom(), $user->getNom());
			$this->assertEquals($userFound->getMotDePasse(), $user->getMotDePasse());
		}
		
		$this->assertNotEquals($nbResult, 0);
		
		$this->assertTrue($userPS->userExists($user));
		
	}
	
}