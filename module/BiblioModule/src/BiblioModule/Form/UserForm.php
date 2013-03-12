<?php

namespace BiblioModule\Form;

use Zend\Form\Annotation;
use Zend\Form\Element;

/**
 * Formulaire d'authentification des utilisateurs
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Annotation\Name("UserForm")
 * @Annotation\Attributes({"class": "form-inline"})
 * @author julien.keruzec
 *
 */ 
class UserForm {

     const _FIELD_USERNAME = 'username';
     const _FIELD_PASSWORD = 'password';
     const _FIELD_SUBMIT = 'submit';
    
    /**
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":1, "max":25}})
     * @Annotation\Validator({"name":"Regex", "options":{"pattern":"/^[a-zA-Z][a-zA-Z0-9_-]{0,24}$/"}})
     * @Annotation\Attributes({"type":"text", "class"="input-small", "placeholder"="Nom d'utilisateur"})
     */
    public $username;

    /**
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":1, "max":25}})
     * @Annotation\Attributes({"type":"password", "class"="input-small", "placeholder"="Mot de passe"})
     */
    public $password;

    /**
     * @Annotation\Attributes({"type":"Submit", "class"="btn", "value":"Se connecter"})
     */
    public $submit;


}
