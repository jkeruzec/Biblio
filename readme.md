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