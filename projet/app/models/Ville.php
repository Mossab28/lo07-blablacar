<?php
/**
 * Modèle Ville.
 * Table : ville (id, nom)
 */
class Ville extends Model
{
    /** A6 : toutes les villes, par ordre alphabétique. */
    public function toutes(): array
    {
        return $this->fetchAll('SELECT * FROM ville ORDER BY nom');
    }

    public function trouverParId(int $id): ?array
    {
        return $this->fetchOne('SELECT * FROM ville WHERE id = ?', [$id]);
    }

    /** Vérifie l'existence d'une ville par son nom (unicité). */
    public function existe(string $nom): bool
    {
        return $this->fetchOne('SELECT id FROM ville WHERE nom = ?', [strtolower($nom)]) !== null;
    }

    /** A7 : ajoute une ville. Retourne le nouvel id, ou 0 si déjà présente. */
    public function ajouter(string $nom): int
    {
        $nom = strtolower(trim($nom));
        if ($nom === '' || $this->existe($nom)) {
            return 0;
        }
        $id = $this->nextId('ville');
        $this->execute('INSERT INTO ville (id, nom) VALUES (?, ?)', [$id, $nom]);
        return $id;
    }
}
