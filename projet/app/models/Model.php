<?php
/**
 * Modèle de base : factorise l'accès PDO pour tous les modèles concrets.
 *
 * Les modèles enfants héritent de $db (la connexion PDO partagée) et de
 * petits utilitaires de requêtage. Cette couche est la SEULE à parler SQL :
 * les contrôleurs et les vues ne manipulent jamais directement la base.
 */
abstract class Model
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    /** Exécute une requête préparée et retourne toutes les lignes. */
    protected function fetchAll(string $sql, array $params = []): array
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    /** Exécute une requête préparée et retourne la première ligne (ou null). */
    protected function fetchOne(string $sql, array $params = []): ?array
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $row = $stmt->fetch();
        return $row === false ? null : $row;
    }

    /** Exécute une requête d'écriture (INSERT/UPDATE/DELETE) ; retourne le succès. */
    protected function execute(string $sql, array $params = []): bool
    {
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    /** Calcule le prochain identifiant disponible pour une table donnée. */
    protected function nextId(string $table): int
    {
        // Les id sont gérés manuellement dans le jeu de données fourni
        // (pas d'AUTO_INCREMENT), on prend donc MAX(id)+1.
        $row = $this->fetchOne("SELECT COALESCE(MAX(id), 0) + 1 AS next_id FROM `$table`");
        return (int) $row['next_id'];
    }
}
