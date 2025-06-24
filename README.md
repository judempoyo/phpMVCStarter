
# PHP MVC Starter Kit 🚀

Un projet de base MVC en PHP moderne avec authentification complète et Tailwind CSS v4.

![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?logo=php)
![Tailwind](https://img.shields.io/badge/Tailwind_CSS-v4-06B6D4?logo=tailwind-css)
![MVC](https://img.shields.io/badge/Architecture-MVC-brightgreen)
![License](https://img.shields.io/badge/License-MIT-blue)
## 🎨 Preview 



## Fonctionnalités principales

- **Architecture MVC** propre et modulaire
- **Frontend moderne** avec Tailwind CSS v4
- **Mode sombre/clair** intégré
- **Système d'authentification complet** :
  - Inscription utilisateur
  - Connexion/Déconnexion
  - Réinitialisation de mot de passe
- **Base de données** avec Illuminate Database (Eloquent)
- **Système de templates** simple
- **Messages flash** pour le feedback utilisateur
- **Sécurité** :
  - Hashage des mots de passe (bcrypt)

## Prérequis

- PHP 8.2 ou supérieur
- Composer
- Node.js (pour Tailwind CSS)
- Serveur web (Apache/Nginx) ou PHP built-in server
- Base de données MySQL/MariaDB

## 🚀 Installation & Configuration

1. **Cloner le repository** :
```bash
git clone https://github.com/judempoyo/phpMVCStarter.git
cd phpMVCStarter
```
2. Installer les dépendances PHP :

```bash
composer install
```
3. Installer les dépendances frontend :

```bash
npm install
 npx @tailwindcss/cli -i ./public/css/style.css -o ./public/css/output.css --watch
```
4. Configurer l'application :

```bash
cp .env.example .env
```

  Éditez le fichier .env avec vos paramètres de base de données.

5. Démarrer le serveur :

```bash
php -S localhost:8000 -t public
```

## Structure du projet
```text
phpMVCStarter/
├── app/
│   ├── config/          # Configurations
│   ├── controllers/     # Contrôleurs
│   ├── core/            # Classes fondamentales
│   ├── helpers/         # Fonctions utilitaires
│   ├── middleware/      # Middlewares
│   ├── models/          # Modèles Eloquent
│   ├── routes/          # Définitions des routes
│   ├── services/        # Services métier
│   └── views/           # Templates
├── public/
│   ├── assets/          # Assets compilés
│   ├── index.php        # Front controller
│   └── .htaccess        # Rewrite rules
├── vendor/              # Dépendances PHP
├── node_modules/        # Dépendances JS
├── .env.example         # Variables d'environnement
├── composer.json        # Configuration PHP
├── package.json         # Configuration Node
├── tailwind.config.js   # Config Tailwind
├── postcss.config.js    # Config PostCSS
└── README.md            # Documentation
```
 
## 🔐 Système d'Authentification
Le starter kit inclut un système complet d'authentification avec :

- Pages de login et register
- Fonctionnalité de réinitialisation de mot de passe
- Protection des routes authentifiées
- Hashage sécurisé des mots de passe

### 🛠 Technologies utilisées
- Backend :

  - PHP 8.2+

  - Illuminate Database (Eloquent)

  - Dotenv

- Frontend :

  - Tailwind CSS v4

  - PostCSS


## 🤝 Contribution
Les contributions sont les bienvenues. Ouvrez une issue ou soumettez une PR.

## 📜 License
MIT

## ✉️ Contact
Judempoyo - mpoyojude0@gmail.com

Lien du projet : https://github.com/judempoyo/phpMVCStarter