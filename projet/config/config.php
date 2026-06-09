<?php
define('ETUDIANT_1', "Moss'Ab Mirande-Ney");
define('ETUDIANT_2', 'Pierre Bheidi');

define('NOMS_ETUDIANTS', ETUDIANT_1 . ' et ' . ETUDIANT_2);

$surDevIsi = isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'dev-isi.utt.fr') !== false;

if ($surDevIsi) {
    define('DB_HOST', 'localhost');
    define('DB_PORT', '3306');

    $secretsFile = __DIR__ . '/secrets.php';
    $s = file_exists($secretsFile)
        ? require $secretsFile
        : ['name' => 'A_REMPLACER_NOM_BASE', 'user' => 'A_REMPLACER_LOGIN', 'pass' => 'A_REMPLACER_MDP'];

    define('DB_NAME', $s['name']);
    define('DB_USER', $s['user']);
    define('DB_PASS', $s['pass']);
} else {
    define('DB_HOST', '127.0.0.1');
    define('DB_PORT', '3306');
    define('DB_NAME', 'blablacar2026');
    define('DB_USER', 'root');
    define('DB_PASS', '');
}
define('DB_CHARSET', 'utf8mb4');

$scriptDir = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '')), '/');
define('BASE_URL', $scriptDir === '' ? '/' : $scriptDir . '/');

define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . '/app');
define('VIEWS_PATH', APP_PATH . '/views');

error_reporting(E_ALL);
ini_set('display_errors', '1');
