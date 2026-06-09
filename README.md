# Projet LO07 2026 — BlaBlaCar

Application web de covoiturage inspirée de BlaBlaCar, réalisée en **PHP / architecture MVC** dans le cadre du module LO07 (UTT — Technologies du Web, Marc LEMERCIER).

**Binôme :** Moss'Ab Mirande-Ney et Pierre Bheidi

## Stack

- **PHP 8** (Front Controller + routeur déclaratif)
- **MySQL** via **PDO** (requêtes 100 % préparées)
- HTML / CSS (aucune dépendance externe)

## Architecture (MVC)

```
projet/
├── index.php              # Front Controller (point d'entrée unique)
├── config/                # configuration + connexion PDO (singleton)
├── app/
│   ├── router/            # table de routes  action → [Contrôleur, méthode]
│   ├── controllers/       # Auth, Admin, Conducteur, Passager, Examinateur, Innovation, Home
│   ├── models/            # Utilisateur, Vehicule, Ville, Trajet, Reservation (+ Model de base)
│   └── views/             # layout (header + fragmentMenu + footer) + une vue par fonctionnalité
├── public/css/            # feuille de style
└── sql/                   # base de données fournie (blablacar2026.sql)
```

## Installation

```bash
# 1. Base de données
mysql -u root -e "CREATE DATABASE IF NOT EXISTS blablacar2026 CHARACTER SET utf8mb4"
mysql -u root blablacar2026 < projet/sql/blablacar2026.sql

# 2. Adapter les identifiants dans projet/config/config.php (DB_USER, DB_PASS, DB_NAME)

# 3. Lancer en local
cd projet && php -S localhost:8000
# → http://localhost:8000/index.php
```

## Comptes de test

Mot de passe commun : `secret`

| Rôle | Login |
|------|-------|
| Administrateur | `boss` |
| Conducteur | `trisprior`, `foureaton`, `jeaninematthews`, `marclem` |
| Passager | `calebprior`, `christinanobody`, `ventura`, … |

## Fonctionnalités

- **Connexion** : F1 login · F2 déconnexion
- **Admin** : A1 liste utilisateurs · A2/A3 ajout conducteur/passager · A4 liste véhicules · A5 ajout véhicule · A6 liste villes · A7 ajout ville
- **Conducteur** : C1 mes véhicules · C2 mes trajets · C3 ajout trajet · C4 passagers d'un trajet actif · C5 clôture + paiements
- **Passager** : P1 mes réservations · P2 réservation d'un trajet actif
- **Examinateur** : E1 superglobales (cookies/sessions) · E2 ajout de 10 réservations aléatoires
- **Innovations** : tableau de bord des données + note d'amélioration MVC
- Barre de menu **dynamique selon le rôle** (`fragmentMenu`)
