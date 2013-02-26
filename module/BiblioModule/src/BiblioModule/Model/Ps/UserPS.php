<?php

namespace BiblioModule\Model\Ps;


use Zend\ServiceManager\InitializerInterface;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use BiblioModule\Model\Po\UserPO;

class UserPS implements InitializerInterface {

	protected $services;

	public function initialize($instance, ServiceLocatorInterface $serviceLocator)
	{
		$services = $serviceLocator;
	}
	
	public function getServiceLocator() {
		$this->services;
		
	}



}