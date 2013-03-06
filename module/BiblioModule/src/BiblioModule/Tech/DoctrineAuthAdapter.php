<?php

namespace BiblioModule\Tech;

use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;
use BiblioModule\Model\Ps\UserPS;
use BiblioModule\Model\Po\UserPO;

class DoctrineAuthAdapter implements AdapterInterface {

	/**
	 * $userPS 
	 *
	 * @var UserPS
	 */
	protected $userPs = null;

	/**
	 * $identity
	 *
	 * @var string
	 */
	protected $identity = null;

	/**
	 * $credential
	 *
	 * @var string
	 */
	protected $credential = null;

	/**
	 * 
	 * @var array
	 */
	protected $authenticateResultInfo = null;

	public function authenticate() {

		$userPo = new UserPO();
		$userPo->setNom($this->identity);
		$userPo->setMotDePasse($this->credential);
		$userExist = $this->userPs->userExists($userPo);

		if ($userExist) {
			$this->authenticateResultInfo['code'] = Result::SUCCESS;
			$this->authenticateResultInfo['identity'] = $userPo;
			$this->authenticateResultInfo['messages'][] = "Authentification OK";
		} else {
			$this->authenticateResultInfo['code'] = Result::FAILURE_IDENTITY_NOT_FOUND;
			$this->authenticateResultInfo['identity'] = null;
			$this->authenticateResultInfo['messages'][] = "Mauvais login ou mot de passe";
		}

		return $this->_authenticateCreateAuthResult();

	}

	/**
	 * Creates a Zend\Authentication\Result object from the information that
	 * has been collected during the authenticate() attempt.
	 *
	 * @return AuthenticationResult
	 */
	protected function _authenticateCreateAuthResult() {
		return new Result($this->authenticateResultInfo['code'],
				$this->authenticateResultInfo['identity'],
				$this->authenticateResultInfo['messages']);
	}


	public function getUserPs() {
		return $this->userPs;
	}

	public function setUserPs(UserPS $userPs) {
		$this->userPs = $userPs;
	}

	public function getIdentity() {
		return $this->identity;
	}

	public function setIdentity($identity) {
		$this->identity = $identity;
	}

	public function getCredential() {
		return $this->credential;
	}

	public function setCredential($credential) {
		$this->credential = $credential;
	}

}
