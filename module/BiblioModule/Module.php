<?php
namespace BiblioModule;

use BiblioModule\Model\BiblioTable;
use BiblioModule\Model\Biblio;
use BiblioModule\Tech\DocumentMapper;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
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
				'Zend\Loader\StandardAutoloader' => array(
						'namespaces' => array(
								__NAMESPACE__ => __DIR__ . '\src\\' . __NAMESPACE__,
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
							try {
							$dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
							} catch (\Exception $e) {
								do {
									echo $e->getMessage();
								} while ($e = $e->getPrevious());
							}
							$resultSetPrototype = new ResultSet();
							$resultSetPrototype->setArrayObjectPrototype(new Biblio());
							return new TableGateway('Biblio', $dbAdapter, null, $resultSetPrototype);
						},
						'Zend\Log' => function($sm) {
							$log = new Logger();
							$writer = new Stream('php://output');
							$log->addWriter($writer);
							return $log;
						},
						'DocumentMapperConfig' => function($sm) {
							$config = new Configuration();
							$config->setProxyDir('/proxies');
							$config->setProxyNamespace('Proxies');
							$config->setHydratorDir('/hydrators');
							$config->setHydratorNamespace('Hydrators');
							$config->setMetadataDriverImpl(AnnotationDriver::create('/classes'));
							$configModule = $sm->get('Config');
							$config->setDefaultDB($configModule['mongoDB']['repository']);
							return $config;
						},
						'BiblioModule\Tech\DocumentMapper' => function($sm) {
							return DocumentManager::create(new Connection(), $sm->get('DocumentMapperConfig'));
						},
								
				),
		);
	}
	
}