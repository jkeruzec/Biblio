Biblio
======

Biblioth�que pour support physique de media {Zend 2; MongoDB; Doctrine ODM}


Installation
------------

D�pendances
-----------

Les d�pendances projet sont g�r�s � partir de Composer.
Le fichier installDependencies.bat permet de lancer le telechargement des sources en local sur un poste Windows.

Plugin
------

Test Unitaire Mise en place de MakeGood et PHPUnits

Installer MakeGood pour Eclipse :
Configurer MakeGood dans votre projet Eclipse en lui sp�cifiant :
 - le fichier de configuration phpunit.xml 
 - les r�pertoires contenant les tests unitaires
 - Un projet du type PHPUnit
 - Modifier le fichier PHPUnitPreparer.php du plugin MakeGood en lui mettant l'URL de l'Autoloader.php Composer.
 
Les tests unitaires se lancent alors � tous les enregistrements du projet (configuration possible). La vue MakeGood permet de suivre l'�volution des tests.