# TP Vendredi Matin (Blog)

## Créer une nouvelle application Zend

Utiliser composer pour générer un nouveau squelette d'application, y ajouter les
modules :

* developer toolbar (dev)
* form
* MVC plugins

## Créer un controller Post

2 routes : list et show

* list -> URL /posts
* show -> URL /posts/123 (123 étant paramétrables)

Enregistrer PostController sous forme InvokableFactory à ce stade

Créer les templates list et show avec du faux-texte à ce stade

La page list affiche la liste des titres de blogs et des liens vers show

La page show affiche le titre, le contenu de l'article, ainsi que la liste des 
commentaires en dessous, (puis plus tard un formulaire pour poster des commentaires)

## Entités

Créer 2 entités : Post (id (integer), title(string), content(text)) et Comment (id (integer), author(string), content(text))
Un post peut contenir plusieurs commentaires, un commentaire est associé à un
seul post

Installer doctrine-orm-module et le configurer comme dans le projet précédent

Ajouter les annotations au niveau des entités, notamment l'association entre Post
et Comment (ATTENTION, la relation OneToMany n'existe pas seule sans ManyToOne)

Générer les tables et ajouter des données de test dans phpMyAdmin

## Services

Créer le service PostService qui dépend de Doctrine\ORM\EntityManager

PostController dépendra du service

Créer et enregistrer une fabrique pour PostService et PostController

## Dév des pages

Ecrire listAction et showAction de façon a ce qu'elles récupèrent les données
issues de la base de données

## Formulaire

Créer un formulaire CommentForm contenant author (Text) et content (TextArea)

Afficher le formulaire sur la page show en bas des commentaires

Modifier le code pour qu'il permette de poster des nouveaux commentaires (associés
à l'article en cours d'affichage)

ATTENTION: penser à ajouter le post dans le comment (avec setPost) avant de l'insérer