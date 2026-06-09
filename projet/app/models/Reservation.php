<?php
class Reservation extends Model
{
    public function parPassager(int $passagerId): array
    {
        return $this->fetchAll(
            "SELECT r.id,
                    t.date_depart, t.heure_depart, t.statut, t.prix,
                    vd.nom AS depart, va.nom AS arrivee,
                    CONCAT(u.prenom, ' ', u.nom) AS conducteur,
                    CONCAT(v.marque, ' ', v.modele) AS vehicule,
                    v.immatriculation
             FROM reservation r
             JOIN trajet t      ON t.id  = r.trajet_id
             JOIN ville vd      ON vd.id = t.ville_depart
             JOIN ville va      ON va.id = t.ville_arrivee
             JOIN utilisateur u ON u.id  = t.conducteur_id
             JOIN vehicule v    ON v.id  = t.vehicule_id
             WHERE r.passager_id = ?
             ORDER BY t.date_depart, t.heure_depart",
            [$passagerId]
        );
    }

    public function passagersDuTrajet(int $trajetId): array
    {
        return $this->fetchAll(
            "SELECT r.id,
                    CONCAT(u.prenom, ' ', u.nom) AS passager,
                    u.login, u.solde
             FROM reservation r
             JOIN utilisateur u ON u.id = r.passager_id
             WHERE r.trajet_id = ?
             ORDER BY u.nom, u.prenom",
            [$trajetId]
        );
    }

    public function brutesParTrajet(int $trajetId): array
    {
        return $this->fetchAll('SELECT * FROM reservation WHERE trajet_id = ?', [$trajetId]);
    }

    public function ajouter(int $trajetId, int $passagerId): int
    {
        $id = $this->nextId('reservation');
        $this->execute(
            'INSERT INTO reservation (id, trajet_id, passager_id) VALUES (?, ?, ?)',
            [$id, $trajetId, $passagerId]
        );
        return $id;
    }
}
