<?php

namespace BiblioModule\Tech;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;
use BiblioModule\Model\Ps\UserPS;

class DoctrineAuthAdapter implements AdapterInterface {

	/**
	 * $userPS 
	 *
	 * @var UserPS
	 */
	protected $userPs = null;

	/**
	 * $identityColumn - the column to use as the identity
	 *
	 * @var string
	 */
	protected $identityColumn = null;

	/**
	 * $credentialColumns - columns to be used as the credentials
	 *
	 * @var string
	 */
	protected $credentialColumn = null;

	public function authenticate() {
		
		//$this->userPs->

	}

	public function getEntityClass() {
		return $this->entityClass;
	}

	public function setEntityClass($entityClass) {
		$this->entityClass = $entityClass;
	}

	public function getIdentityColumn() {
		return $this->identityColumn;
	}

	public function setIdentityColumn(string $identityColumn) {
		$this->identityColumn = $identityColumn;
	}

	public function getCredentialColumn() {
		return $this->credentialColumn;
	}

	public function setCredentialColumn(string $credentialColumn) {
		$this->credentialColumn = $credentialColumn;
	}

}
