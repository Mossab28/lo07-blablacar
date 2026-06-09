<?php
/**
 * Modèle Trajet.
 * Table : trajet (id, ville_depart, ville_arrivee, conducteur_id, vehicule_id,
 *                 prix, date_depart, heure_depart, statut)
 */
class Trajet extends Model
{
    /**
     * Sélection enrichie : noms des villes de départ/arrivée, conducteur,
     * véhicule. Utilisée par les listes côté conducteur et passager.
     * La clause WHERE est passée par l'appelant (déjà paramétrée).
     */
    private function selectEnrichi(string $where = '', array $params = [], string $orderBy = 't.date_depart, t.heure_depart'): array
    {
        $sql =
            "SELECT t.id, t.prix, t.date_depart, t.heure_depart, t.statut,
                    t.conducteur_id, t.vehicule_id,
                    vd.nom AS ville_depart, va.nom AS ville_arrivee,
                    CONCAT(u.prenom, ' ', u.nom) AS conducteur,
                    v.marque, v.modele, v.immatriculation
             FROM trajet t
             JOIN ville vd       ON vd.id = t.ville_depart
             JOIN ville va       ON va.id = t.ville_arrivee
             JOIN utilisateur u  ON u.id  = t.conducteur_id
             JOIN vehicule v     ON v.id  = t.vehicule_id
             $where
             ORDER BY $orderBy";
        return $this->fetchAll($sql, $params);
    }

    /** C2 : tous les trajets (actifs et passifs) d'un conducteur. */
    public function parConducteur(int $conducteurId): array
    {
        return $this->selectEnrichi('WHERE t.conducteur_id = ?', [$conducteurId]);
    }

    /** C4 / C5 : trajets ACTIFS d'un conducteur. */
    public function actifsParConducteur(int $conducteurId): array
    {
        return $this->selectEnrichi("WHERE t.conducteur_id = ? AND t.statut = 'actif'", [$conducteurId]);
    }

    /** P2 : tous les trajets actifs disponibles à la réservation. */
    public function tousActifs(): array
    {
        return $this->selectEnrichi("WHERE t.statut = 'actif'");
    }

    public function trouverParId(int $id): ?array
    {
        $rows = $this->selectEnrichi('WHERE t.id = ?', [$id]);
        return $rows[0] ?? null;
    }

    /** Version brute (sans jointures) pour la logique métier. */
    public function brutParId(int $id): ?array
    {
        return $this->fetchOne('SELECT * FROM trajet WHERE id = ?', [$id]);
    }

    /** C3 : crée un trajet. Retourne le nouvel id. */
    public function ajouter(
        int $villeDepart, int $villeArrivee, int $conducteurId, int $vehiculeId,
        float $prix, string $dateDepart, string $heureDepart
    ): int {
        $id = $this->nextId('trajet');
        $this->execute(
            "INSERT INTO trajet
                (id, ville_depart, ville_arrivee, conducteur_id, vehicule_id,
                 prix, date_depart, heure_depart, statut)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'actif')",
            [$id, $villeDepart, $villeArrivee, $conducteurId, $vehiculeId, $prix, $dateDepart, $heureDepart]
        );
        return $id;
    }

    /** C5 : passe un trajet en statut 'passif'. */
    public function cloturer(int $id): bool
    {
        return $this->execute("UPDATE trajet SET statut = 'passif' WHERE id = ?", [$id]);
    }
}
