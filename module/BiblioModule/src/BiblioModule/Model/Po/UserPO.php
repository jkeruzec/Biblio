<?php

namespace BiblioModule\Model\Po;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
@ODM\Document(collection="User")
*/
class UserPO {

	/** @ODM\Id */
	protected $id;
	
	/** @ODM\String") */
	protected $nom;
	
	/** @ODM\String */
	protected $prenom;
	
	/** @ODM\String */
	protected $mail;
	
	/**
	 * 
	 * @param number $id
	 */
	public function __construct($id=0) {
		$this->id = $id;
	}
	
	/**
	 * 
	 * @param string $id
	 */
	public function setId($id) {
		$this->id = $id;
	}
	
	/**
	 * 
	 * @param string $nom
	 */
	public function setNom($nom) {
		$this->nom = $nom;
	}
	
	/**
	 * 
	 * @param string $prenom
	 */
	public function setPrenom($prenom) {
		$this->prenom = $prenom;
	}
	
	/**
	 * 
	 * @param string $mail
	 */
	public function setMail($mail) {
		$this->mail = $mail;
	}
	
	/**
	 * 
	 * @return string
	 */
	public function __toString() {
		return $this->id . ' ' . $this->nom;
	}
	
}