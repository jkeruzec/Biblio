<?php
/**
 * Zend Framework (http://framework.zend.com/)
*
* @link http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
* @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
* @license http://framework.zend.com/license/new-bsd New BSD License
*/

namespace BiblioModule\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use BiblioModule\Form\UserForm;
use Zend\Form\Annotation\AnnotationBuilder;

class IndexController extends AbstractActionController
{
	
	protected $loginForm;
	
	/**
	 * 
	 * @return Ambigous <\Zend\Form\Form, \Zend\Form\ElementInterface, ElementInterface, \Zend\Form\FormInterface, \Zend\Form\FieldsetInterface>
	 */
	public function getLoginForm() {
		
		if(! $this->loginForm) {
			$userForm = new UserForm();
			$builder = new AnnotationBuilder();
			$this->loginForm = $builder->createForm($userForm);
		}
		
		return $this->loginForm;
	}
	
	public function indexAction()
	{
		
		$pageComponent = array('form' => $this->getLoginForm(), 'messages' => $this->flashMessenger()->getMessages());
		
		return $pageComponent;
	}
	
	public function authenticateAction() {
		
		$form = $this->getLoginForm();
		$request = $this->getRequest();
		
		if($request->isPost()) {
			$form->setData($request->getPost());
			if($form->isValid()) {
			}
		}
		
	}
}