<?php

namespace BiblioModule\Form;

use Zend\Form\Annotation;

/**
 * Formulaire d'authentification des utilisateurs
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Annotation\Name("User")
 * @author julien.keruzec
 *
 */	
class UserForm {
	
	/**
	 * @Annotation\Type("Zend\Form\Element\Text")
	 * @Annotation\Required({"required":"true" })
	 * @Annotation\Filter({"name":"StripTags"})
	 * @Annotation\Options({"label":"Utilisateur:"})
	 * @var Zend\Form\Element\Text
	 */
	public $username;
	
	/**
	 * @Annotation\Type("Zend\Form\Element\Password")
	 * @Annotation\Required({"required":"true" })
	 * @Annotation\Filter({"name":"StripTags"})
	 * @Annotation\Options({"label":"Password:"})
	 * @var Zend\Form\Element\Password
	 */
	public $password;
	
	/**
	 * @Annotation\Type("Zend\Form\Element\Checkbox")
	 * @Annotation\Options({"label":"Rester connecter ?:"})
	 * @var Zend\Form\Element\Checkbox
	 */
	public $rememberMe;
	
	/**
	 * @Annotation\Type("Zend\Form\Element\Submit")
	 * @Annotation\Options({"label":"Se connecter"})
	 * @var Zend\Form\Element\Checkbox
	 */
	public $submit;
	
	
	
}