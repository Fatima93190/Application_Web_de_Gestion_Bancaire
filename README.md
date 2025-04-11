#  Application de Gestion Bancaire

##  Contexte

Une institution bancaire souhaite moderniser la gestion de ses clients, de leurs comptes et des contrats souscrits (assurance, crédits, épargne, etc.).  
Cette application web permet à un **administrateur unique** de gérer toutes ces données via une **interface sécurisée, fluide et ergonomique**.

---

##  Objectifs

- Authentification sécurisée de l’administrateur
- Enregistrement et gestion des clients
- Création et gestion des comptes bancaires
- Souscription et gestion des contrats

---

##  Acteur du Système

- **Administrateur** : seul utilisateur autorisé à accéder à l’interface d’administration

---

##  Fonctionnalités

###  Authentification
- Page de connexion (nom + mot de passe)
- Vérification des identifiants (hashés avec Bcrypt)
- Création d’une session sécurisée
- Déconnexion

###  Tableau de Bord
- Nombre total de clients
- Nombre total de comptes
- Nombre total de contrats
- Liens rapides vers les sections

###  Gestion des Clients
- Créer un client (Nom, Prénom, Email, Téléphone, Adresse)
- Lister tous les clients
- Modifier les informations d’un client
- Supprimer un client (si aucun compte ni contrat associé)

###  Gestion des Comptes Bancaires
- Créer un compte (RIB, Type, Solde initial, Client associé)
- Lister tous les comptes
- Modifier un compte
- Supprimer un compte

###  Gestion des Contrats
- Créer un contrat (Type, Montant, Durée, Client associé)
- Lister tous les contrats
- Modifier un contrat
- Supprimer un contrat

---

##  Architecture du Projet

L’application suit l’architecture **MVC** :

```
/Application_Web_de_Gestion_Bancaire
|- /controllers
|  |- AccueilController.php
|  |- AdminController.php 
|  |- ClientController.php
|  |- CompteController.php 
|  |- ContratController.php
|- /lib
|  |- database.php
|  |- utils.php
|- /models
|  |- /repositories
|  |  |- AdminRepository.php
|  |  |- ClientRepository.php
|  |  |- CompteRepository.php
|  |  |- ContratRepository.php
|  |- Admin.php
|  |- Client.php
|  |- Compte.php
|  |- Contrat.php
|- /views
|  |- /templates
|  |  |- footer.php
|  |  |- header.php
|  |- /source
|  |  |- client.js
|  |  |- compte.js
|  |  |- contrat.js
|  |  |- login.js
|  |  |- style.css
|  |-/client
|  |  |- client_create.php
|  |  |- client_edit.php
|  |  |- client_list.php
|  |  |- client_view.php
|  |-/compte
|  |  |- compte_create.php
|  |  |- compte_edit.php
|  |  |- compte_list.php
|  |  |- compte_view.php
|  |-/contrat
|  |  |- contrat_create.php
|  |  |- contrat_edit.php
|  |  |- contrat_list.php
|  |  |- contrat_view.php
|  |- home.php
|  |- 404.php
|- index.php
|- README.md
```

---

##  Stack Technique

| Élément         | Technologie              |
|----------------|---------------------------|
| Langage serveur | PHP (architecture MVC)    |
| Base de données | MySQL                     |
| Front-end       | HTML, CSS, JavaScript     |
| Sécurité        | Bcrypt (hashage), PDO (requêtes préparées), sessions sécurisées |

---

##  Sécurité

- Mot de passe de l’administrateur **hashé avec Bcrypt**
- Authentification via **sessions sécurisées**
- Utilisation de **requêtes préparées** avec PDO pour éviter les injections SQL
- Vérification des formats (email, téléphone) côté front-end et back-end

---

##  Interface Utilisateur

###  Pages principales

- **Page de connexion** : formulaire d’authentification
- **Tableau de bord** : résumé global (nombre de clients, comptes, contrats)
- **Pages de gestion** :
  - Liste / Création / Modification / Suppression des **clients**
  - Liste / Création / Modification / Suppression des **comptes bancaires**
  - Liste / Création / Modification / Suppression des **contrats**

###  Navigation

- **Menu latéral** :
  - Accès rapide à chaque module : clients, comptes, contrats
  - Bouton de déconnexion
- **Header** :
  - Nom de l’application
  - Informations de session (facultatif)

---

##  Installation

1. **Cloner le dépôt** :
   ```bash
   git clone https://github.com/Fatima93190/Application_Web_de_Gestion_Bancaire.git
   cd Application_Web_de_Gestion_Bancaire
   ```
2. **Configurer la base de données**.
3. **Lancer l'application** .
---

##  Auteur

Projet réalisé dans le cadre de la formation **Développeur Web et Web Mobile - Simplon.co**  
Promo_7 2025

---