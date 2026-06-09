<?php
/**
 * Point d'entrée unique (Front Controller) de l'application BlaBlaCar 2026.
 *
 * Toutes les requêtes passent par ici : index.php?action=...
 * Conformément au sujet, on NE réinitialise PAS systématiquement la session
 * à chaque requête (sinon impossible de rester connecté). La session n'est
 * remise à zéro qu'au tout premier accès (aucune action demandée), ce qui
 * garantit qu'aucun utilisateur n'est connecté au démarrage de l'application.
 */

session_start();

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/models/Model.php';

// Autochargement simple des modèles (toutes les classes Model du dossier).
foreach (glob(APP_PATH . '/models/*.php') as $modelFile) {
    require_once $modelFile;
}
require_once APP_PATH . '/controllers/Controller.php';
require_once APP_PATH . '/router/router.php';

$action = $_GET['action'] ?? '';

// Démarrage « à froid » : pas d'action -> on s'assure que personne n'est connecté.
if ($action === '') {
    $_SESSION['login_id'] = -1;
    $action = 'accueil';
}

Router::dispatch($action);
