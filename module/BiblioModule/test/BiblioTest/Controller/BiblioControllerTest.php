<?php
namespace BiblioTest\Controller;

use BiblioTest\Bootstrap;
use BiblioModule\Controller\BiblioController;
use Zend\Http\Request;
use Zend\Http\Response;
use Zend\Mvc\MvcEvent;
use Zend\Mvc\Router\RouteMatch;
use Zend\Mvc\Router\Http\TreeRouteStack as HttpRouter;
use PHPUnit_Framework_TestCase;

class BiblioControllerTest extends PHPUnit_Framework_TestCase
{
	/**
	 * 
	 * @var unknown
	 */
	protected $controller;
	
	/**
	 * 
	 * @var unknown
	 */
	protected $request;
	
	/**
	 * 
	 * @var unknown
	 */
	protected $response;
	protected $routeMatch;
	protected $event;

	/**
	 * (non-PHPdoc)
	 * @see PHPUnit_Framework_TestCase::setUp()
	 */
	protected function setUp()
	{
		$serviceManager = Bootstrap::getServiceManager();
		$this->controller = new BiblioController();
		$this->request    = new Request();
		$this->routeMatch = new RouteMatch(array('controller' => 'index'));
		$this->event      = new MvcEvent();
		$config = $serviceManager->get('Config');
		$routerConfig = isset($config['router']) ? $config['router'] : array();
		$router = HttpRouter::factory($routerConfig);
		$this->event->setRouter($router);
		$this->event->setRouteMatch($this->routeMatch);
		$this->controller->setEvent($this->event);
		$this->controller->setServiceLocator($serviceManager);
	}

	/**
	 * 
	 */
	public function testAddActionCanBeAccessed()
	{
		$this->routeMatch->setParam('action', 'add');
		$result   = $this->controller->dispatch($this->request);
		$response = $this->controller->getResponse();
		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * 
	 */
	public function testDeleteActionCanBeAccessed()
	{
		$this->routeMatch->setParam('action', 'delete');

		$result   = $this->controller->dispatch($this->request);
		$response = $this->controller->getResponse();

		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * 
	 */
	public function testEditActionCanBeAccessed()
	{
		$this->routeMatch->setParam('action', 'edit');

		$result   = $this->controller->dispatch($this->request);
		$response = $this->controller->getResponse();

		$this->assertEquals(200, $response->getStatusCode());
	}

	/**
	 * 
	 */
	public function testIndexActionCanBeAccessed()
	{
		$this->routeMatch->setParam('action', 'index');

		$result   = $this->controller->dispatch($this->request);
		$response = $this->controller->getResponse();

		$this->assertEquals(200, $response->getStatusCode());
	}
	
	/**
	 * 
	 */
	public function testGetBiblioTableReturnsAnInstanceOfBiblioTable() {
		$this->assertInstanceOf('BiblioModule\Model\BiblioTable', $this->controller->getBiblioTable());
	}
	
	/**
	 * 
	 */
	public function testBiblioControllerLogIsSingleton() {
		$this->assertNotNull($this->controller->getLog());		
	}
	
	
}
