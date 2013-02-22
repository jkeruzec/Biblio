<?php

namespace BiblioModule\Model\Po;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
@ODM\Document
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
	
	public function __construct($id=0) {
		$this->id = $id;
	}
	
	public function setId($id) {
		$this->id = $id;
	}
	
	public function setNom($nom) {
		$this->nom = $nom;
	}
	
	public function setPrenom($prenom) {
		$this->prenom = $prenom;
	}
	
	public function setMail($mail) {
		$this->mail = $mail;
	}
	
	public function __toString() {
		return $this->id . ' ' . $this->nom;
	}
	
}