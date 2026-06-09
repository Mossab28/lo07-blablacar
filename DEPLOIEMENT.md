# Déploiement sur dev-isi.utt.fr

Guide pas-à-pas pour mettre le projet en ligne, accessible depuis Internet à l'adresse :

```
http://dev-isi.utt.fr/~TONLOGIN/lo07_tp/projet/
```

(remplace `TONLOGIN` par ton login UTT — ex. `mirandey`)

---

## Étape 1 — VPN étudiant

dev-isi.utt.fr n'est accessible que depuis le réseau UTT.
- Installe et **connecte le VPN étudiant UTT** (Cisco AnyConnect / GlobalProtect selon ce que fournit l'UTT).
- Garde le VPN actif pendant tout le transfert.

---

## Étape 2 — Transférer les fichiers avec FileZilla (SFTP)

1. Télécharge **FileZilla** (client FTP/SFTP) : https://filezilla-project.org/
2. Ouvre une connexion :
   | Champ | Valeur |
   |-------|--------|
   | Hôte | `dev-isi.utt.fr` |
   | Identifiant | ton **login LDAP** UTT |
   | Mot de passe | ton **mot de passe LDAP** UTT |
   | Port | `22` |
   - Clique **Connexion rapide**.
3. Côté serveur (panneau de droite), entre dans le dossier **`www`**.
4. **Récupère le fichier `connexion_base.txt`** (à la racine, panneau droit) :
   double-clique pour le télécharger → il contient ton **mot de passe MySQL**
   (différent du mot de passe LDAP). Note-le, il servira à l'étape 4 et 5.
5. Dans `www`, crée un dossier **`lo07_tp`** (clic droit → Créer un répertoire).
6. Entre dans `www/lo07_tp`, puis **glisse-dépose tout le dossier `projet/`**
   (depuis le panneau de gauche, ton Mac) vers le serveur.

   Résultat attendu sur le serveur :
   ```
   www/lo07_tp/projet/index.php
   www/lo07_tp/projet/config/
   www/lo07_tp/projet/app/
   www/lo07_tp/projet/public/
   www/lo07_tp/projet/sql/
   ```

> 💡 Le dossier `www/` correspond à `/home/etu/TONLOGIN/www/`. Tout ce qui est
> dedans est servi sur `http://dev-isi.utt.fr/~TONLOGIN/...`.

---

## Étape 3 — Importer la base de données (phpMyAdmin)

1. Ouvre **https://dev-isi.utt.fr/phpMyAdmin/** (attention aux majuscules, VPN actif).
2. Connecte-toi :
   - **Utilisateur** : ton login LDAP
   - **Mot de passe** : celui trouvé dans `connexion_base.txt` (étape 2.4)
3. Sélectionne **ta base** dans la colonne de gauche (elle existe déjà, son nom
   est souvent ton login — note-le, il servira à l'étape 4).
4. Onglet **Importer** → **Choisir un fichier** →
   `projet/sql/blablacar2026.sql` (sur ton Mac) → **Exécuter**.
5. Vérifie que les 5 tables apparaissent : `utilisateur`, `vehicule`, `ville`,
   `trajet`, `reservation`.

---

## Étape 4 — Renseigner les identifiants dans config.php

Le code détecte tout seul qu'il tourne sur dev-isi. Il te reste juste à remplir
**3 valeurs** dans [`projet/config/config.php`](projet/config/config.php),
dans le bloc `if ($surDevIsi)` :

```php
define('DB_NAME', 'ta_base');         // nom de TA base (vu à l'étape 3.3)
define('DB_USER', 'ton_login_ldap');  // ex: mirandey
define('DB_PASS', 'ton_mdp_mysql');   // celui de connexion_base.txt
```

Modifie le fichier **avant** de l'envoyer (étape 2), ou ré-uploade juste
`config.php` après modification via FileZilla.

---

## Étape 5 — Tester

Ouvre dans ton navigateur (VPN actif) :

```
http://dev-isi.utt.fr/~TONLOGIN/lo07_tp/projet/index.php
```

Tu dois voir la page d'accueil BlaBlaCar. Connecte-toi avec `boss` / `secret`.

---

## En cas de problème

| Symptôme | Cause probable / solution |
|----------|---------------------------|
| Page blanche | Erreur PHP → active l'affichage des erreurs (déjà actif dans config.php) et recharge ; lis le message. |
| « Erreur de connexion à la base » | DB_NAME / DB_USER / DB_PASS faux dans config.php (bloc dev-isi). |
| 404 Not Found | Mauvais chemin : le projet doit être dans `www/lo07_tp/projet/`. Vérifie avec FileZilla. |
| Le CSS ne se charge pas | Vérifie que le dossier `public/css/` a bien été transféré. |
| Accès refusé / pas le VPN | Reconnecte le VPN étudiant. |

---

## Rappel pour le rendu (readme.txt)

L'URL à mettre dans `readme.txt` :
```
http://dev-isi.utt.fr/~TONLOGIN/lo07_tp/projet/
```
N'oublie pas de remplacer `TONLOGIN` par ton vrai login UTT.
