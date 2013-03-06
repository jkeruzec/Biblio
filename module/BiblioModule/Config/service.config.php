<?php 

use BiblioModule\Model\Ps\UserPS;

use BiblioModule\Model\BiblioTable;
use BiblioModule\Model\Biblio;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\MongoDB\Connection;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\Log\Logger;
use Zend\Log\Writer\Stream;
use BiblioModule\Form\UserAuthSession;
use Zend\Authentication\AuthenticationService;
use BiblioModule\Tech\DoctrineAuthAdapter;

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
					AnnotationDriver::registerAnnotationClasses();
					$config->setMetadataDriverImpl(AnnotationDriver::create('/classes'));
					$configModule = $sm->get('Config');
					$config->setDefaultDB($configModule['mongoDB']['repository']);
					return $config;
				},
				'BiblioModule\Tech\DocumentMapper' => function($sm) {
					return DocumentManager::create(new Connection(), $sm->get('DocumentMapperConfig'));
				},
				'BiblioModule\Tech\UserPS' => function($sm) {
					return new UserPS();
				},
				'BiblioModule\Form\UserAuthSession' => function($sm) {
					return new UserAuthSession('BiblioModuleLogin');
				},
				'AuthService' => function($sm) {
					$adapter = new DoctrineAuthAdapter();
					$authService = new AuthenticationService();
					$authService->setStorage($sm->get('BiblioModule\Form\UserAuthSession'));
					$authService->setAdapter($adapter);
					return $authService;
				},
		),
);