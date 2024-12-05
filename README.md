# 🎉 Quizzzz by MB 🎉

Quizzzz est une application web développée en Laravel qui permet de gérer des questions et des réponses. Les utilisateurs peuvent ajouter des questions, y associer des réponses, et indiquer si une réponse est correcte ou fausse.

## 🚀 Prérequis

Avant de commencer, assurez-vous que les composants suivants sont installés sur votre machine :

- 🐘 PHP >= 8.1
- 🎼 Composer
- 🐬 MySQL
- 🟢 Node.js & npm

## ⚙️ Installation

Suivez les étapes ci-dessous pour installer et configurer le projet sur votre environnement local.

1. **Clonez le dépôt**

   ```bash
   git clone https://github.com/votre-utilisateur/quizzzz.git
   cd quizzzz
   ```

2. **Installez les dépendances PHP**

   Utilisez Composer pour installer les dépendances backend.

   ```bash
   composer install
   ```

3. **Installez les dépendances JavaScript**

   Utilisez npm pour installer les dépendances frontend.

   ```bash
   npm install
   ```

4. **Configurer le fichier `.env`**

   Dupliquez le fichier `.env.example` en `.env` et configurez les paramètres de votre base de données.

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=quizzzz
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Générez la clé de l'application** 🔑

   ```bash
   php artisan key:generate
   ```

6. **Exécutez les migrations** 📜

   Créez les tables nécessaires dans la base de données.

   ```bash
   php artisan migrate
   ```

7. **Lancez le serveur de développement** 🖥️

   Démarrez le serveur pour accéder à l'application.

   ```bash
   php artisan serve
   ```

   Votre application sera accessible à l'adresse `http://localhost:8000`.

8. **Compilez les assets frontend** 📦

   Compilez les fichiers de style et JavaScript.

   ```bash
   npm run dev
   ```

## 📚 Utilisation

Une fois l'application lancée, vous pouvez naviguer sur le site pour ajouter des questions, des réponses et indiquer lesquelles sont correctes. Utilisez l'interface utilisateur pour gérer facilement votre contenu.

## 🤝 Contribution

Les contributions sont les bienvenues ! Veuillez soumettre une pull request pour ajouter des améliorations ou signaler des problèmes.

## ⚖️ Licence

Ce projet est sous licence MIT. Voir le fichier `LICENSE` pour plus de détails.
