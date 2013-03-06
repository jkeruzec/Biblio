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

	public function findAll() {
		
	}
	
	public function findByNom() {
		
	}
	
	/**
	 * 
	 * @param UserPO $user
	 * @return Doctrine\ODM\MongoDB\Cursor
	 */
	public function findByNomAndPassword(UserPO $user) {
		return $this->
				getDocumentManager()->
				getRepository($user->getRepositoryName())->
				findBy(array('nom' => $user->getNom(), 'motDePasse' => $user->getMotDePasse()));
	}



}