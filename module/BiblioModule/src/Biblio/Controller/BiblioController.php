<?php
namespace Biblio\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class BiblioController extends AbstractActionController {
	
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
			$this->Bibliotable = $sm->get('Biblio\Model\BiblioTable');
			$this->getLog()->info($this->BiblioTable);
		}
		
		return $this->BiblioTable;
		
	}
	
	public function getLog() {
		return $this->getServiceLocator()->get('Zend\Log');		
	}
	

}