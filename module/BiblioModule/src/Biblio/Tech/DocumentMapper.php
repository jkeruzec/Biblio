<?php

namespace Tech;

use Doctrine\Common\ClassLoader;
use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

class DocumentMapper {

	/**
	*	@var DocumentMapper
	*/
	private static $instance;
	
	/**
	 * @var DocumentManager
	 */
	private static $dm;
	
	/**
	 * @var Configuration
	 */	
	private static $config;

	private function __construct() {
	
		AnnotationDriver::registerAnnotationClasses();
		
		self::$config = new Configuration();
		self::$config->setProxyDir('/proxies');
		self::$config->setProxyNamespace('Proxies');
		self::$config->setHydratorDir('/hydrators');
		self::$config->setHydratorNamespace('Hydrators');
		self::$config->setMetadataDriverImpl(AnnotationDriver::create('/classes'));

		self::$dm = DocumentManager::create(new Connection(), self::$config);
		
	}
	
	/**
	 * @assert() === getInstanceDocumentMapper()
	 */
	public function getInstanceDocumentMapper() {
		if(!isset(self::$instance)) {
			self::$instance = new DocumentMapper();
		}
		return self::$dm;
	}
	
	

}