<?php
namespace BiblioModule\Form;

use Zend\Authentication\Storage;

class UserAuthSession extends Storage\Session
{
	/**
	 * 
	 * @param number $rememberMe
	 * @param number $time
	 */
	public function setRememberMe($rememberMe = 0, $time = 1209600)
	{
		if ($rememberMe == 1) {
			$this->session->getManager()->rememberMe($time);
		}
	}

	/**
	 * 
	 */
	public function forgetMe()
	{
		$this->session->getManager()->forgetMe();
	}
}
