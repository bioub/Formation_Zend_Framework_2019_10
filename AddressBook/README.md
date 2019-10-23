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
