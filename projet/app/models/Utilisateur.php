<?php
/**
 * Modèle Utilisateur : administrateurs, conducteurs et passagers.
 * Table : utilisateur (id, nom, prenom, role, login, password, solde)
 */
class Utilisateur extends Model
{
    /** A1 : tous les utilisateurs, triés par id. */
    public function tous(): array
    {
        return $this->fetchAll('SELECT * FROM utilisateur ORDER BY id');
    }

    /** Un utilisateur par son id. */
    public function trouverParId(int $id): ?array
    {
        return $this->fetchOne('SELECT * FROM utilisateur WHERE id = ?', [$id]);
    }

    /** F1 : vérifie un couple login / mot de passe pour l'authentification. */
    public function authentifier(string $login, string $password): ?array
    {
        return $this->fetchOne(
            'SELECT * FROM utilisateur WHERE login = ? AND password = ?',
            [$login, $password]
        );
    }

    /** Liste filtrée par rôle (utile pour les sélecteurs de propriétaire, etc.). */
    public function parRole(string $role): array
    {
        return $this->fetchAll('SELECT * FROM utilisateur WHERE role = ? ORDER BY nom, prenom', [$role]);
    }

    /** Liste des passagers (E2 : tirage aléatoire). */
    public function passagers(): array
    {
        return $this->parRole('passager');
    }

    /** A2 / A3 : ajoute un conducteur ou un passager. Retourne le nouvel id. */
    public function ajouter(string $nom, string $prenom, string $role, float $solde): int
    {
        $id = $this->nextId('utilisateur');
        // Login auto = prenomnom en minuscules sans espaces ; mot de passe par défaut.
        $login = strtolower(preg_replace('/\s+/', '', $prenom . $nom));
        $this->execute(
            'INSERT INTO utilisateur (id, nom, prenom, role, login, password, solde)
             VALUES (?, ?, ?, ?, ?, ?, ?)',
            [$id, $nom, $prenom, $role, $login, 'secret', $solde]
        );
        return $id;
    }

    /** Crédite (montant > 0) ou débite (montant < 0) le solde d'un utilisateur. */
    public function ajusterSolde(int $id, float $montant): bool
    {
        return $this->execute(
            'UPDATE utilisateur SET solde = solde + ? WHERE id = ?',
            [$montant, $id]
        );
    }
}
