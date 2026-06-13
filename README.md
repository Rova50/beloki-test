# Beloki - Gestion de Stock & Clients

Beloki est une application Laravel élaborée pour la gestion centralisée des produits, des stocks et des clients. Conçue avec un accent particulier sur l'expérience utilisateur et l'efficacité administrative, elle offre une interface moderne et intuitive basée sur Laravel Breeze et Tailwind CSS.

## 🚀 Fonctionnalités Clés

### 📊 Tableau de Bord Intelligent
- **Statistiques en Temps Réel :** Vue d'ensemble sur le nombre total de produits, le stock cumulé et le nombre de clients.
- **Alertes Stock Faible :** Identification automatique des produits dont la quantité est critique (inférieure à 10 unités).
- **Activité Récente :** Listes rapides des derniers produits ajoutés et des nouveaux clients.

### 📦 Gestion des Produits (CRUD complet)
- Catalogue détaillé avec gestion des SKUs uniques.
- Suivi visuel de la disponibilité avec badges d'état.
- Fiches produits complètes incluant l'historique des stocks par emplacement.

### 🏢 Gestion des Stocks
- Suivi précis des mouvements de stock par emplacement (entrepôts, rayons, etc.).
- Historique chronologique des entrées de stock.
- Interface de réapprovisionnement rapide liée directement aux produits.

### 👤 Gestion des Clients
- Répertoire complet des clients avec coordonnées détaillées.
- Avatars générés automatiquement pour une identification rapide.
- Suivi de l'ancienneté des membres.

## 🛠️ Installation

1. **Cloner le projet**
   ```bash
   git clone <repository-url>
   cd beloki-test
   ```

2. **Installer les dépendances PHP**
   ```bash
   composer install
   ```

3. **Installer les dépendances JS**
   ```bash
   npm install
   npm run build
   ```

4. **Configuration de l'environnement**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Migration et Alimentation de la base (Seeding)**
   ```bash
   php artisan migrate:fresh --seed
   ```

## 🔐 Accès Admin (Seeded)

L'application est pré-alimentée avec un utilisateur administrateur pour vos tests :

- **Utilisateur :** Rova Andriniaina
- **Email :** `rova@example.com`
- **Mot de passe :** `password`

## 🎨 Design & Ergonomie
- **Interface Moderne :** Utilisation intensive de Tailwind CSS pour un rendu professionnel.
- **Responsive :** Entièrement consultable sur mobile, tablette et desktop.
- **Identité Visuelle :** Intégration du logo Beloki et d'une charte graphique cohérente.

---
Développé avec ❤️ pour une gestion de stock optimisée.
