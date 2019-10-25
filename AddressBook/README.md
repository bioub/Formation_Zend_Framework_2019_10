# Exercice

## Créer les pages sociétés (sur le modèle de contacts)

* Créer une classe SocieteController dans le dossier Controller
* Enregistrer la classe dans module.config.php (section controllers)
* Y ajouter 2 actions : listAction et showAction
* Créer 2 routes dans module.config.php
  * /societes -> listAction
  * /societes/123 -> showAction (123 doit être paramétrable)
* Créer 2 vues dans views/application/societe qui correspondent à
nos 2 actions list et show
* Remplir les vues avec du faux texte
* Utiliser les aides de vues url (pour faire des liens entre
la liste et la fiche societe) et headTitle pour personnaliser
le titre de chaque page

## Créer une class SocieteService

* Créer une classe SocieteService dans Application\Service
* Ajouter une propriété $em de type Doctrine\ORM\EntityManager
* Générer un constructeur avec $em en paramètre
* Générer une factory pour cette classe avec vendor\bin\generate-factory-for-class
* Ajouter une config dans module.config.php indiquant que SocieteService se
créé à partir de SocieteServiceFactory
* Injecter $societeService dans SocieteController (en générant le constructeur
comme pour SocieteService)
* Générer et enregistrer une factory pour SocieteController

## Utiliser Doctrine

* Dans l'entité Societe ajouter quelques propriétés de votre choix
* Ajouter les annotation Doctrine pour déclarer le mapping vers la base de données
* Utiliser la commande de doctrine-module pour générer la table
* Remplir cette table avec des données dans phpMyAdmin
* Créer des méthodes dans SocieteService pour retrouver la liste et une société
par id
* Appeler ces méthodes depuis le controller
* Remplacer le faux texte dans vos vues