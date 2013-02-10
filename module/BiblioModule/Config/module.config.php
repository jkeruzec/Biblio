<?php
return array (
		'controllers' => array (
				'invokables' => array (
						'Biblio\Controller\Biblio' => 'Biblio\Controller\BiblioController',
						),
				),
		'route' => array (
				'routes' => array (
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
		'View_manager' => array (
				'template_path_stack' => array (
						'Biblio' => __DIR__.'\..\view',
						),
				),
		);