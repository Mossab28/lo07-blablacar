<?php
session_start();

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/models/Model.php';

foreach (glob(APP_PATH . '/models/*.php') as $modelFile) {
    require_once $modelFile;
}
require_once APP_PATH . '/controllers/Controller.php';
require_once APP_PATH . '/router/router.php';

$action = $_GET['action'] ?? '';

if (!isset($_SESSION['app_demarree'])) {
    $_SESSION['app_demarree'] = true;
    $_SESSION['login_id'] = -1;
}

if ($action === '') {
    $action = 'accueil';
}

Router::dispatch($action);
