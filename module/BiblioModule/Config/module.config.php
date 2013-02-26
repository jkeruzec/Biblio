<?php
return array (
		'controllers' => array (
				'invokables' => array (
						'Biblio\Controller\Biblio' => 'BiblioModule\Controller\BiblioController',
						'Biblio\Controller\Index' => 'BiblioModule\Controller\IndexController',
				),
		),
		'persistanceService' => array (
				'invokables' => array (
						'Biblio\Model\Ps\User' => 'BiblioModule\Model\Ps\UserPS',
				),
		),
		'router' => array (
				'routes' => array (
						'home' => array(
								'type' => 'Zend\Mvc\Router\Http\Literal',
								'options' => array(
										'route' => '/',
										'defaults' => array(
												'controller' => 'Biblio\Controller\Index',
												'action' => 'index',
										),
								),
						),
						'Biblio' => array (
								'type' => 'segment',
								'options' => array (
										'route' => '/Biblio[/:action][/:id]',
										'constraints' => array (
												'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
												'id' => '[0-9]*',
										),
										'defaults' => array (
												'controller' => 'Biblio\Controller\Biblio',
												'action' => 'index',
										),
								),
						),
				),
		),
		'service_manager' => array(
				'factories' => array(
						'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
				),
		),
		'translator' => array(
				'locale' => 'en_US',
				'translation_file_patterns' => array(
						array(
								'type' => 'gettext',
								'base_dir' => __DIR__ . '/../language',
								'pattern' => '%s.mo',
						),
				),
		),
		'view_manager' => array (
				'display_not_found_reason' => true,
				'display_exceptions' => true,
				'doctype' => 'HTML5',
				'not_found_template' => 'error/404',
				'exception_template' => 'error/index',
				'template_map' => array(
						'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
						'biblio/index/index' => __DIR__ . '/../view/BiblioModule/BiblioModule/index.phtml',
						'error/404' => __DIR__ . '/../view/error/404.phtml',
						'error/index' => __DIR__ . '/../view/error/index.phtml',
				),
				'template_path_stack' => array (
						__DIR__.'/../view',
				),
		),
);