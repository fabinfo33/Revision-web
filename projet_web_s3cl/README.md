## Projet de programmation Web de S3
##### Développé par AUBERT Daphné et LEVY Fabien S3C

### Fonctionnalités implémentées

- Parcours de la base de données
- Page "à propos"
- Inscription d'un abonné
- Connexion d'un abonné
- Ajout d'un enregistrement au panier
- Supprimer un enregistrement du panier
- Commander les enregistrements du panier (qui prend en compte les crédits de
l'abonné)
- Recherche de musicien et album


### Améliorations possibles
- Acheter un album (pas seulement un enregistrement)
- Afficher les albums les mieux vendus
- Optimiser l'affichage et l'ergonomie
- Optimisation de certaines page (requêtes trop longues)


### Difficultés rencontrées
- Créer des association entre les tables de la base de données avec Doctrine
(ManyToOne, OneToOne, etc...).
- Difficulté à bien mettre en forme les "forms"


### Bugs détectés

- Pagination lente due à une utilisation non optimale du bundle de 
pagination `KnpPaginatorBundle`.
Explication : dans `MusicienController` à la ligne 26.
```php
$pagination = $paginator->paginate(
            //$this->getDoctrine()->getRepository(Musicien::class)->findAllQuery(), //juste mais ne marche pas si changement de page
            $this->getDoctrine()->getRepository(Musicien::class)->findAll(), //long à charger
            $request->query->getInt('page', 1)/*page number*/, 10);
```

- Certaines associations provoque la génération de nombreuses requêtes (80+) sur une page qui n'utilise pas
cette association, sans que l'on ai déterminé la cause. Exemple dans Enregistrement/show.html.twig
ligne 18 (test nécessitant de décommenter les champs dans les entités associées + getters).

                