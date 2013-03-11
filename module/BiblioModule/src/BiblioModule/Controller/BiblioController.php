<?php
namespace BiblioModule\Controller;

use Zend\View\Model\ViewModel;

class BiblioController extends BaseController {
	
	protected $BiblioTable;
	protected static $log;

	public function indexAction() {
		
	}

	public function addAction() {

	}

	public function editAction() {

	}

	public function deleteAction() {

	}
	
	public function getBiblioTable() {
		
		if(!$this->BiblioTable) {
			$sm = $this->getServiceLocator();
			$this->BiblioTable = $sm->get('Biblio\Model\BiblioTable');
			$this->getLog()->info($this->BiblioTable != null ? "OK" : "Appel Echoue");
		}
		
		return $this->BiblioTable;
		
	}
	

}
