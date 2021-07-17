# Vintage-Lab
## Description du projet :
Dans le cadre d’une formation PHP, un travail est à réaliser sur base de fonction prédéfinie et de la matière vue au cours. 

Ce projet est la deuxième partie, c’est pourquoi certaine partie sont déjà écrite et fonctionnelle dès le départ. 

## Installation du projet PHP. 
Nécessite l’extension mysqli d’installée et fonctionnel. 

Ne nécessite pas de version PHP particulière (une version 5.6 au minimum) 

## Fichiers de configuration : 
Les données de connexion à la DB ce trouve dans /base/config.php 

La base de données est à créer et vous trouverez les tables nécessaires dans le fichier db.sql.zip à la racine du projet. 

La table admin comporte les utilisateurs. Les mots de passes sont crypté en md5(). Le mot de passe de l’utilisateur 1 est "_4dmiN !_". Vous pouvez à loisir modifier les mots de passe en accédant à la table via PHPMyAdmin ou équivalent. Tout en respectant le paterne imposé par la fonction qui vérifié la validité du MDP : **Un chiffre, une majuscule, un caractère spécial**. 

