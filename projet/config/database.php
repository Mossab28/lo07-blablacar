<?php
/**
 * Connexion à la base de données via PDO (singleton).
 *
 * Fournit une unique instance PDO partagée par tous les modèles,
 * pour éviter d'ouvrir plusieurs connexions par requête HTTP.
 */
class Database
{
    private static ?PDO $instance = null;

    /** Retourne l'instance PDO unique, en la créant au premier appel. */
    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            $dsn = sprintf(
                'mysql:host=%s;port=%s;dbname=%s;charset=%s',
                DB_HOST,
                DB_PORT,
                DB_NAME,
                DB_CHARSET
            );

            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                self::$instance = new PDO($dsn, DB_USER, DB_PASS, $options);
            } catch (PDOException $e) {
                // Message clair plutôt qu'une trace brute en cas de souci de config.
                die('Erreur de connexion à la base de données : ' . $e->getMessage());
            }
        }

        return self::$instance;
    }
}
