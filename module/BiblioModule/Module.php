<?php
namespace BiblioModule;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

/**
 * 
 * @author julien.keruzec
 *
 */
class Module {
	
	/**
	 * 
	 * @param MvcEvent $e
	 */
	public function onBootstrap(MvcEvent $e)
	{
		$e->getApplication()->getServiceManager()->get('translator');
		$eventManager        = $e->getApplication()->getEventManager();
		$moduleRouteListener = new ModuleRouteListener();
		$moduleRouteListener->attach($eventManager);
	}

	/**
	 * 
	 * @return multitype:multitype:multitype:string
	 */
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
	
	/**
	 * 
	 */
	public function getConfig()
	{
		return include __DIR__.'\config\module.config.php';
	}
	
	/**
	 * 
	 */
	public function getServiceConfig()
	{
		return include __DIR__.'\config\service.config.php';
	}
	
}