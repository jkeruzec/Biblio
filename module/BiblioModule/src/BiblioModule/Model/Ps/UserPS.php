<?php

namespace BiblioModule\Model\Ps;

use BiblioModule\Model\Po\UserPO;
use BiblioModule\Model\Ps\CrudEntityPS;

/**
 * 
 * @author julien.keruzec
 *
 */
class UserPS extends CrudEntityPS  {

	
	public function findByNom() {
		
	}
	
	/**
	 * Retourne la liste des user qui possèdent le nom et password du user en paramètre
	 * @param UserPO $user
	 * @return Doctrine\ODM\MongoDB\Cursor
	 */
	public function findByNomAndPassword(UserPO $user) {
		return $this->
				getDocumentManager()->
				getRepository($user->getRepositoryName())->
				findBy(array('nom' => $user->getNom(), 'motDePasse' => $user->getMotDePasse()));
	}

	
	/**
	 * Test si le user existe en base
	 * @param UserPO $user
	 * @return boolean la valeur du test
	 */
	public function userExists(UserPO $user) {
		$cursor = $this->findByNomAndPassword($user);
		$userExists = false;
		foreach($cursor as $user) {
			$userExists = true;
			break; 
		}
		
		return $userExists;
	}


}