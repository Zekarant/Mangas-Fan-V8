# Mangas'Fan

## Variables d'environnements

Pour éviter les problèmes de variables d'environnements manquants, créez le fichier `.env.local` suivant :
```
APP_SECRET='$ecretf0rt3st'
DATABASE_URL=mysql://root:root@127.0.0.1:3306/mangasfan_v8
MESSENGER_TRANSPORT_DSN=doctrine://default
```
En fonction de votre utilisation de la base de données, `DATABASE_URL` peut varier.

## Base de données

Pour pouvoir créer la base de données, faire la commande : `symfony console doctrine:migrations:migrate`. La commande aura pour but de suivre les 
différents fichiers de migration présent dans le projet, ici en l'occurence pour créer les différentes tables.

Un jeu de données est proposé dans `mf_dev_data.sql`. Pour l'importer dans la base de données, il suffit d'accéder à phpmyadmin ou une autre interface et d'importer ses données.

### Docker

Dans le fichier `docker-compose.yml`se trouve des containers pour `mysql` et `phpmyadmin`. Pour les utiliser, lancer la commande `docker-compose up -d`. Les identifiants pour phpmyadmin étant `root` pour les deux champs de connexion.

Les ports utilisés sont les ports `3306` (pour mysql) et `8010` (pour phpmyadmin). Les ports peuvent être modifié si besoin, prévenir l'équipe de dev dans ce cas.

La configuration à mettre dans le fichier `.env.local` si vous utilisez la dockerisation est la suivante :
```DATABASE_URL=mysql://root:root@127.0.0.1:3306/mangasfan_v8```