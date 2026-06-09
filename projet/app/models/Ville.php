<?php
class Ville extends Model
{
    public function toutes(): array
    {
        return $this->fetchAll('SELECT * FROM ville ORDER BY nom');
    }

    public function trouverParId(int $id): ?array
    {
        return $this->fetchOne('SELECT * FROM ville WHERE id = ?', [$id]);
    }

    public function existe(string $nom): bool
    {
        return $this->fetchOne('SELECT id FROM ville WHERE nom = ?', [strtolower($nom)]) !== null;
    }

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
