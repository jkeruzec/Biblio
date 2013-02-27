<?php

namespace BiblioModule\Tech;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

class ServiceHandler implements ServiceLocatorAwareInterface {
	
	/**
	 * 
	 * @var Zend\ServiceManager\ServiceLocatorInterface
	 */
	protected $service_manager;
	
	/**
	 * (non-PHPdoc)
	 * @see \Zend\ServiceManager\ServiceLocatorAwareInterface::setServiceLocator()
	 */
	public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
	{
		$this->service_manager = $serviceLocator;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \Zend\ServiceManager\ServiceLocatorAwareInterface::getServiceLocator()
	 */
	public function getServiceLocator()
	{
		return $this->service_manager;
	}
	
	/**
	 * 
	 */
	protected function getDocumentManager() {
		return $this->service_manager->get('BiblioModule\Tech\DocumentMapper');
	}
	
	
}