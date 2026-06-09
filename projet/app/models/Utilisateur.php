<?php
class Utilisateur extends Model
{
    public function tous(): array
    {
        return $this->fetchAll('SELECT * FROM utilisateur ORDER BY id');
    }

    public function trouverParId(int $id): ?array
    {
        return $this->fetchOne('SELECT * FROM utilisateur WHERE id = ?', [$id]);
    }

    public function authentifier(string $login, string $password): ?array
    {
        return $this->fetchOne(
            'SELECT * FROM utilisateur WHERE login = ? AND password = ?',
            [$login, $password]
        );
    }

    public function parRole(string $role): array
    {
        return $this->fetchAll('SELECT * FROM utilisateur WHERE role = ? ORDER BY nom, prenom', [$role]);
    }

    public function passagers(): array
    {
        return $this->parRole('passager');
    }

    public function ajouter(string $nom, string $prenom, string $role, float $solde): int
    {
        $id = $this->nextId('utilisateur');

        $login = strtolower(preg_replace('/\s+/', '', $prenom . $nom));
        $this->execute(
            'INSERT INTO utilisateur (id, nom, prenom, role, login, password, solde)
             VALUES (?, ?, ?, ?, ?, ?, ?)',
            [$id, $nom, $prenom, $role, $login, 'secret', $solde]
        );
        return $id;
    }

    public function ajusterSolde(int $id, float $montant): bool
    {
        return $this->execute(
            'UPDATE utilisateur SET solde = solde + ? WHERE id = ?',
            [$montant, $id]
        );
    }
}
