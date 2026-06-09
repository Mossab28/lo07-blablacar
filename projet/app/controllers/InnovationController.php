<?php
/**
 * Contrôleur Innovations. Accessible sans connexion.
 *
 * - data : exploitation originale des données (statistiques + classements)
 * - mvc  : explication de l'amélioration apportée à l'architecture MVC
 */
class InnovationController extends Controller
{
    /**
     * Innovation DATA : un mini « tableau de bord » du covoiturage construit
     * uniquement à partir des données existantes (aucune table ajoutée).
     */
    public function data(): void
    {
        $db = Database::getConnection();

        // Top conducteurs par nombre de trajets proposés.
        $topConducteurs = $db->query(
            "SELECT CONCAT(u.prenom, ' ', u.nom) AS conducteur, COUNT(t.id) AS nb
             FROM utilisateur u
             JOIN trajet t ON t.conducteur_id = u.id
             GROUP BY u.id ORDER BY nb DESC, conducteur LIMIT 5"
        )->fetchAll();

        // Lignes (trajets) les plus réservées.
        $topTrajets = $db->query(
            "SELECT CONCAT(vd.nom, ' → ', va.nom) AS ligne, COUNT(r.id) AS nb_resa,
                    t.prix
             FROM trajet t
             JOIN ville vd ON vd.id = t.ville_depart
             JOIN ville va ON va.id = t.ville_arrivee
             LEFT JOIN reservation r ON r.trajet_id = t.id
             GROUP BY t.id ORDER BY nb_resa DESC, ligne LIMIT 5"
        )->fetchAll();

        // Indicateurs globaux.
        $stats = $db->query(
            "SELECT
                (SELECT COUNT(*) FROM trajet)                              AS total_trajets,
                (SELECT COUNT(*) FROM trajet WHERE statut='actif')         AS trajets_actifs,
                (SELECT COUNT(*) FROM reservation)                         AS total_resa,
                (SELECT ROUND(AVG(prix),2) FROM trajet)                    AS prix_moyen,
                (SELECT ROUND(SUM(t.prix),2) FROM reservation r
                    JOIN trajet t ON t.id=r.trajet_id)                     AS volume_affaires"
        )->fetch();

        $this->render('innovations/data', [
            'topConducteurs' => $topConducteurs,
            'topTrajets'     => $topTrajets,
            'stats'          => $stats,
        ], 'Innovation : tableau de bord des données');
    }

    /** Innovation MVC : page explicative. */
    public function mvc(): void
    {
        $this->render('innovations/mvc', [], 'Innovation : amélioration MVC');
    }
}
