============================================================
Projet LO07 2026 - BlaBlaCar
============================================================

Etudiant 1 : Moss'Ab Mirande-Ney
Etudiant 2 : Pierre Bheidi

URL du projet sur dev-isi.utt.fr :
http://dev-isi.utt.fr/~<login>/lo07_tp/projet/

------------------------------------------------------------
1. INSTALLATION DE LA BASE DE DONNEES
------------------------------------------------------------
- Importer le fichier sql/blablacar2026.sql dans votre base MySQL
  (phpMyAdmin ou : mysql -u <user> -p <base> < sql/blablacar2026.sql).
- Renseigner les identifiants de connexion dans config/config.php
  (constantes DB_HOST, DB_NAME, DB_USER, DB_PASS).

------------------------------------------------------------
2. LANCEMENT
------------------------------------------------------------
- En local (PHP + MySQL) :  php -S localhost:8000  (depuis le dossier projet/)
  puis ouvrir http://localhost:8000/index.php
- Sur dev-isi.utt.fr : déposer le dossier projet/ dans lo07_tp/
  et ouvrir l'URL ci-dessus.

------------------------------------------------------------
3. COMPTES DE TEST (mot de passe : secret)
------------------------------------------------------------
- Administrateur : boss
- Conducteur     : trisprior, foureaton, jeaninematthews, marclem
- Passager       : calebprior, christinanobody, ...

------------------------------------------------------------
4. ARCHITECTURE (MVC)
------------------------------------------------------------
index.php ................. Front Controller (point d'entree unique)
config/ ................... configuration + connexion PDO
app/router/ ............... routeur (table action -> controleur)
app/controllers/ .......... controleurs (Auth, Admin, Conducteur,
                            Passager, Examinateur, Innovation, Home)
app/models/ ............... modeles (Utilisateur, Vehicule, Ville,
                            Trajet, Reservation) + Model de base
app/views/ ................ vues (layout + une vue par fonctionnalite)
public/css/ ............... feuille de style

------------------------------------------------------------
5. FONCTIONNALITES IMPLEMENTEES
------------------------------------------------------------
Connexion  : F1 Login, F2 Deconnexion
Admin      : A1 liste utilisateurs, A2 ajout conducteur, A3 ajout passager,
             A4 liste vehicules, A5 ajout vehicule, A6 liste villes,
             A7 ajout ville
Conducteur : C1 mes vehicules, C2 mes trajets, C3 ajout trajet,
             C4 passagers d'un trajet actif, C5 cloture + paiements
Passager   : P1 mes reservations, P2 reservation d'un trajet actif
Examinateur: E1 superglobales (cookies/sessions), E2 10 reservations aleatoires
Innovations: tableau de bord des donnees + note sur l'amelioration MVC
Barre de menu dynamique selon le role (fragmentMenu).
