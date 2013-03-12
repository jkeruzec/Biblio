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
	 * @return UserForm
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
	    $userConnecte = null;
	    
	    if($this->getServiceLocator()->get('AuthService')->hasIdentity()) {
	        $userConnecte = $this->getServiceLocator()->get('AuthService')->getStorage()->read();
	    }
	    
		$pageComponent = array('form' => $this->getLoginForm(), 
		                       'messages' => $this->flashMessenger()->getMessages(),
		                       'utilisateurConnecte' => $userConnecte
		);
		
		return $pageComponent;
	}
	
	public function authenticateAction() {
		
		$form = $this->getLoginForm();
		$request = $this->getRequest();
		$redirect = 'home';
		
		// Vérification du post du formulaire
		if($request->isPost()) {
		    
			$form->setData($request->getPost());
			
			if($form->isValid()) {
			    
			    // Récupération des champs du formulaire
			    $username = $form->get(UserForm::_FIELD_USERNAME)->getValue();
			    $motDePasse = $form->get(UserForm::_FIELD_PASSWORD)->getValue();
			    
			    $authService = $this->getServiceLocator()->get('AuthService');
			    
			    $authService->getAdapter()->setIdentity($username);
			    $authService->getAdapter()->setCredential($motDePasse);
			    $authService->getAdapter()->setUserPs($this->getServiceLocator()->get('BiblioModule\Tech\UserPS'));
			    
			    // Authentification de l'utilisateur
			    $result = $authService->authenticate();
			    
			    foreach ($result->getMessages() as $message) {
			        $this->flashMessenger()->addMessage($message);
			    }
			    
			    if($result->isValid()) {
			        $redirect = 'accueil';
			        $authService->getStorage()->write($username);
			    }
			    
			}
			else {
			    foreach($form->getElements() as $element) {
			        foreach($element->getMessages() as $message) {
			            $this->flashMessenger()->addMessage($element->getName() . ' ' . $message);
			        }
			    }   
			        
			}
		}
		
		return $this->redirect()->toRoute($redirect);
		
	}
}