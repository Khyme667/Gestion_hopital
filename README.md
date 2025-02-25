# Gestion Hospitalière

Une application web développée avec **Laravel** pour gérer efficacement les opérations d’un hôpital, incluant la gestion des patients, des consultations, du personnel, des stocks, des rendez-vous, et plus encore. Le projet vise à simplifier les processus administratifs et cliniques tout en assurant sécurité et performance.

## Fonctionnalités

### 1. Gestion des Patients
- Création, modification, et suppression des dossiers patients.
- Historique des consultations pour chaque patient.

### 2. Gestion des Consultations
- Planification et suivi des consultations (passées et futures).
- Attribution d’un médecin à un patient.
- Gestion des ordonnances et prescriptions (fichiers chiffrés).

### 3. Gestion du Personnel
- Ajout, modification, et suppression des employés.
- Attribution des rôles (Médecin, Infirmier, Administrateur).
- Gestion des horaires de travail.

### 4. Gestion des Stocks
- Suivi des médicaments et équipements disponibles.
- Alerte visuelle en cas de stock faible.
- Gestion des fournisseurs.

### 5. Gestion des Rendez-vous
- Prise de rendez-vous simplifiée avec statut (en attente, confirmé, annulé).
- Liaison automatique avec une consultation lors de la confirmation.

### 6. Sécurité et Utilisateurs
- Authentification et autorisation basées sur les rôles (Administrateur, Médecin, Infirmier).
- Journalisation des actions des utilisateurs dans une table `activity_logs`.
- Chiffrement des données sensibles (ex. ordonnances et prescriptions).

### 7. Exigences non fonctionnelles
- **Optimisation des performances** : Pagination, mise en cache des médecins, chargement anticipé des relations.
- **Sauvegarde automatique** : Sauvegarde quotidienne de la base de données avec `spatie/laravel-backup`.
- **Interface responsive** : Design moderne avec Tailwind CSS et Bootstrap, adapté à tous les appareils.

## Technologies utilisées

- **Framework** : Laravel 10.x
- **Base de données** : PostgreSQL
- **Frontend** : Tailwind CSS, Bootstrap 5, Font Awesome (icônes)
- **Sécurité** : Chiffrement avec Laravel `Crypt`, authentication via Laravel Breeze
- **Sauvegarde** : Package `spatie/laravel-backup`
- **Outils** : Vite pour la compilation des assets

## Pré-requis

- PHP >= 8.1
- Composer
- Node.js et npm (pour la compilation des assets)
- PostgreSQL >= 15.x
- `pg_dump` (pour les sauvegardes avec PostgreSQL)

## Installation

1. **Cloner le projet** :
   ```bash
   git clone https://github.com/Khyme667/Gestion_hopital.git
   cd gestion_hopital

   Installer les dépendances :
composer install
npm install

Configurer .env :

Copiez .env.example vers .env et configurez PostgreSQL
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=db_name
DB_USERNAME=votre_utilisateur
DB_PASSWORD=votre_mot_de_passe


migrer la base :
php artisan migrate

compile et lance le serveur
npm run dev
php artisan serve

Crédits
Développé par Tsitana Iloharaoke Khyme.