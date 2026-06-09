<?php
/**
 * Modèle Vehicule.
 * Table : vehicule (id, marque, modele, annee, immatriculation, proprietaire_id)
 */
class Vehicule extends Model
{
    /**
     * A4 : tous les véhicules avec le nom du propriétaire reconstruit
     * (prenom + nom) — les clés primaires ne sont pas destinées à l'affichage.
     */
    public function tousAvecProprietaire(): array
    {
        return $this->fetchAll(
            "SELECT v.id, v.marque, v.modele, v.annee, v.immatriculation,
                    CONCAT(u.prenom, ' ', u.nom) AS proprietaire
             FROM vehicule v
             JOIN utilisateur u ON u.id = v.proprietaire_id
             ORDER BY v.id"
        );
    }

    /** C1 : véhicules appartenant à un conducteur donné. */
    public function parProprietaire(int $proprietaireId): array
    {
        return $this->fetchAll(
            'SELECT * FROM vehicule WHERE proprietaire_id = ? ORDER BY id',
            [$proprietaireId]
        );
    }

    public function trouverParId(int $id): ?array
    {
        return $this->fetchOne('SELECT * FROM vehicule WHERE id = ?', [$id]);
    }

    /** A5 : ajoute un véhicule. Retourne le nouvel id. */
    public function ajouter(string $marque, string $modele, int $annee, string $immatriculation, int $proprietaireId): int
    {
        $id = $this->nextId('vehicule');
        $this->execute(
            'INSERT INTO vehicule (id, marque, modele, annee, immatriculation, proprietaire_id)
             VALUES (?, ?, ?, ?, ?, ?)',
            [$id, $marque, $modele, $annee, $immatriculation, $proprietaireId]
        );
        return $id;
    }
}
