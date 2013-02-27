Biblio
======

Bibliothèque pour support physique de media {Zend 2; MongoDB; Doctrine ODM}


Installation
------------

Dépendances
-----------

Les dépendances projet sont gérés à partir de Composer.
Le fichier installDependencies.bat permet de lancer le telechargement des sources en local sur un poste Windows.

Plugin
------

Test Unitaire Mise en place de MakeGood et PHPUnits

Installer MakeGood pour Eclipse :
Configurer MakeGood dans votre projet Eclipse en lui spécifiant :
 - le fichier de configuration phpunit.xml 
 - les répertoires contenant les tests unitaires
 - Un projet du type PHPUnit
 - Modifier le fichier PHPUnitPreparer.php du plugin MakeGood en lui mettant l'URL de l'Autoloader.php Composer.
 
Les tests unitaires se lancent alors à tous les enregistrements du projet (configuration possible). La vue MakeGood permet de suivre l'évolution des tests.

Note de développement
---------------------

PHPUnit permet de mettre des dépendances entre les tests à l'aide de l'annotation @depends
Dans l'exemple ci-dessous, le test "testMergeExistingUser" dépend de l'execution du test "testInsertSimlpeUserIntoBase". Le resultat de la dépendance est passé à l'appelant.
Exemple :
/**
	 * 
	 * @return \BiblioModule\Model\Po\UserPO
	 */
	public function testInsertSimlpeUserIntoBase() {
		$userPS = $this->getUserPS();
		$user1 = new UserPO();
		$user1->setNom("Keru");
		$userPS->create($user1);
		$userPS->commit($user1);
		return $user1;
	}
	
	/**
	 * @depends testInsertSimlpeUserIntoBase
	 * @param UserPO $user1
	 */
	public function testMergeExistingUser($user1) {
		$userPS = $this->getUserPS();
		$user1->setPrenom("Julien");
		$user1 = $userPS->merge($user1);
		$userPS->commit($user1);
	}
