<?php
/**
 * Configuration globale de l'application BlaBlaCar 2026
 * Projet LO07 - Marc LEMERCIER
 *
 * Centralise les paramètres modifiables : noms des étudiants,
 * identifiants de connexion à la base de données, et chemins.
 */

// --- Noms des deux étudiants (affichés dans la barre de menu) ---
define('ETUDIANT_1', "Moss'Ab Mirande-Ney");
define('ETUDIANT_2', 'Pierre Bheidi');
// Chaîne prête à l'emploi : « X et Y »
define('NOMS_ETUDIANTS', ETUDIANT_1 . ' et ' . ETUDIANT_2);

// --- Paramètres de connexion à la base MySQL ---
// À adapter sur dev-isi.utt.fr (login / mot de passe / nom de base UTT).
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');
define('DB_NAME', 'blablacar2026');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

// --- URL de base de l'application ---
// Détection automatique du répertoire dans lequel tourne index.php.
$scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
define('BASE_URL', $scriptDir === '' ? '/' : $scriptDir . '/');

// --- Chemins physiques ---
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('VIEWS_PATH', APP_PATH . '/views');

// Affichage des erreurs en développement (à désactiver en production).
error_reporting(E_ALL);
ini_set('display_errors', '1');
