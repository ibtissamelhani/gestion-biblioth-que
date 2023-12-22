Projet de Gestion de Réservation de Livres dans une Bibliothèque
Ce projet est une application de gestion de réservation de livres dans une bibliothèque, développée en utilisant PHP avec l'approche OOP, PDO pour l'accès à la base de données et le modèle MVC pour l'organisation du code.

Fonctionnalités
Gestion des rôles : l'application prend en charge deux rôles principaux : administrateur et utilisateur.
Gestion des réservations : les utilisateurs peuvent effectuer des réservations de livres disponibles et consulter leurs réservations existantes.
Gestion des livres : l'administrateur peut ajouter de nouveaux livres, modifier les détails des livres existants et marquer les livres comme disponibles ou non disponibles.
Authentification et autorisation : l'application gère l'authentification des utilisateurs et l'autorisation d'accès en fonction des rôles.
Configuration de l'environnement de développement
Assurez-vous d'avoir PHP installé sur votre machine.
Clonez ce dépôt dans votre répertoire de développement local.
Configurez les informations de connexion à la base de données dans le fichier config/database.php.
Ouvrez l'application dans votre navigateur et vous devriez être prêt à l'utiliser.
Structure du projet
app : Ce répertoire contient le code de l'application.
Controllers : Les contrôleurs qui gèrent les actions et les interactions avec les modèles et les vues.
Models : Les modèles qui représentent les entités de la base de données et interagissent avec elle.
Views : Les vues qui affichent les données et interagissent avec les utilisateurs.
config : Ce répertoire contient les fichiers de configuration de l'application.
public : Ce répertoire contient les fichiers accessibles publiquement (CSS, JS, images, etc.).
database.sql : Le fichier SQL contenant la structure de la base de données.
