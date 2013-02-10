<?php
namespace BiblioModule;

use Biblio\Model\BiblioTable;
use Biblio\Model\Biblio;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Log\Logger;
use Zend\Log\Writer\Stream;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;


class Module {
	
	public function onBootstrap(MvcEvent $e)
	{
		$e->getApplication()->getServiceManager()->get('translator');
		$eventManager        = $e->getApplication()->getEventManager();
		$moduleRouteListener = new ModuleRouteListener();
		$moduleRouteListener->attach($eventManager);
	}
	
	public function getAutoloaderConfig()  
	{
		return array(
				'Zend\Loader\ClassMapAutoloader' => array(
						__DIR__.'/autoload_classmap.php',
				),
				'Zend\Loader\StandardAutoloader' => array(
						'namespaces' => array(
								__NAMESPACE__ => __DIR__.'/src/'.__NAMESPACE__,
								),
						), 
				); 
	}
	
	public function getConfig()
	{
		return include __DIR__.'\config\module.config.php';
	}
	
	public function getServiceConfig()
	{
		return array(
				'factories' => array(
						'Biblio\Model\BiblioTable' =>  function($sm) {
							$tableGateway = $sm->get('BiblioTableGateway');
							$table = new BiblioTable($tableGateway);
							return $table;
						},
						'BiblioTableGateway' => function ($sm) {
							$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
							$resultSetPrototype = new ResultSet();
							$resultSetPrototype->setArrayObjectPrototype(new Biblio());
							return new TableGateway('Biblio', $dbAdapter, null, $resultSetPrototype);
						},
						'Zend\Log' => function($sm) {
							$log = new Logger();
							$writer = new Stream('./../../../data/logs/logfile');
							$log->addWriter($writer);
							return $log;
						},
				),
		);
	}
	
}