<?php

namespace BiblioModule\Form;

use Zend\Form\Annotation;

/**
 * Formulaire d'authentification des utilisateurs
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Annotation\Name("UserForm")
 * @author julien.keruzec
 *
 */ 
class UserForm {

    /**
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":1, "max":25}})
     * @Annotation\Validator({"name":"Regex", "options":{"pattern":"/^[a-zA-Z][a-zA-Z0-9_-]{0,24}$/"}})
     * @Annotation\Attributes({"type":"text"})
     * @Annotation\Options({"label":"Username:"})
     */
    public $username;

    /**
     * @Annotation\Filter({"name":"StringTrim"})
     * @Annotation\Validator({"name":"StringLength", "options":{"min":1, "max":25}})
     * @Annotation\Attributes({"type":"password"})
     * @Annotation\Options({"label":"Mot de passe:"})
     */
    public $password;

    /**
     * @Annotation\Attributes({"type":"Checkbox"})
     * @Annotation\Options({"label":"Rester connecter:"})
     */
    public $rememberMe;

    /**
     * @Annotation\Attributes({"type":"Submit"})
     * @Annotation\Attributes({"value":"Se connecter"})
     */
    public $submit;

}
