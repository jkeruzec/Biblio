<?php

namespace BiblioModule\Model\Po;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use BiblioModule\Model\Po\basePO;

/**
@ODM\Document(collection="User")
@ODM\UniqueIndex(keys={"nom"="asc", "mail"="asc"})
 */
class UserPO extends basePO {

	/** @ODM\Id */
	protected $id;

	/** @ODM\String */
	protected $nom;

	/** @ODM\String */
	protected $prenom;

	/** @ODM\String */
	protected $mail;

	/** @ODM\String */
	protected $motDePasse;

	/**
	 * 
	 * @param number $id
	 */
	public function __construct($id = 0) {
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
	 * @return number
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * 
	 * @return string
	 */
	public function getPrenom() {
		return $this->prenom;
	}

	/**
	 * 
	 * @return string
	 */
	public function getNom() {
		return $this->nom;
	}

	/**
	 * 
	 * @return string
	 */
	public function __toString() {
		return $this->id . ' ' . $this->nom;
	}

	/**
	 * 
	 * @return string
	 */
	public function getMail() {
		return $this->mail;
	}

	/**
	 * @return string
	 */
	public function getMotDePasse() {
		return $this->motDePasse;
	}

	/**
	 * 
	 * @param string $motDePasse
	 */
	public function setMotDePasse($motDePasse) {
		$this->motDePasse = md5($motDePasse);
	}

}
