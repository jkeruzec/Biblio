<?php

namespace BiblioModule\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class BaseController extends AbstractActionController {
	
	public function getLog() {
		return $this->getServiceLocator()->get('Zend\Log');
	}
	
}