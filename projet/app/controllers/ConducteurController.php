<?php
/**
 * Contrôleur Conducteur (C1..C5).
 */
class ConducteurController extends Controller
{
    private function garde(): array
    {
        return $this->exigerRole(['conducteur']);
    }

    /** C1 : liste des véhicules du conducteur connecté. */
    public function mesVehicules(): void
    {
        $user = $this->garde();
        $vehicules = (new Vehicule())->parProprietaire((int) $user['id']);
        $this->render('conducteur/vehicules', [
            'vehicules'  => $vehicules,
            'conducteur' => $user,
        ], 'Mes véhicules');
    }

    /** C2 : tous les trajets (actifs et passifs) du conducteur. */
    public function mesTrajets(): void
    {
        $user = $this->garde();
        $trajets = (new Trajet())->parConducteur((int) $user['id']);
        $this->render('conducteur/trajets', [
            'trajets'    => $trajets,
            'conducteur' => $user,
            'flash'      => $this->flash(),
        ], 'Mes trajets');
    }

    /** C3 : formulaire de création d'un trajet. */
    public function formTrajet(): void
    {
        $user = $this->garde();
        $villes    = (new Ville())->toutes();
        $vehicules = (new Vehicule())->parProprietaire((int) $user['id']);
        $this->render('conducteur/form_trajet', [
            'villes'    => $villes,
            'vehicules' => $vehicules,
        ], 'Nouveau trajet');
    }

    /** C3 : traitement de la création d'un trajet. */
    public function ajouterTrajet(): void
    {
        $user = $this->garde();

        $villeDepart  = $_POST['ville_depart'] ?? '';
        $villeArrivee = $_POST['ville_arrivee'] ?? '';
        $vehiculeId   = $_POST['vehicule_id'] ?? '';
        $prix         = $_POST['prix'] ?? '';
        $date         = $_POST['date_depart'] ?? '';
        $heure        = $_POST['heure_depart'] ?? '';

        // Validations : champs présents, villes différentes, véhicule au conducteur.
        $vehicule = ctype_digit((string) $vehiculeId)
            ? (new Vehicule())->trouverParId((int) $vehiculeId)
            : null;

        $erreur = null;
        if (!ctype_digit((string) $villeDepart) || !ctype_digit((string) $villeArrivee)
            || $vehicule === null || !is_numeric($prix) || $date === '' || $heure === '') {
            $erreur = 'Tous les champs sont obligatoires et doivent être valides.';
        } elseif ($villeDepart === $villeArrivee) {
            $erreur = 'La ville de départ et la ville d\'arrivée doivent être différentes.';
        } elseif ((int) $vehicule['proprietaire_id'] !== (int) $user['id']) {
            $erreur = 'Vous ne pouvez créer un trajet qu\'avec l\'un de vos propres véhicules.';
        }

        if ($erreur !== null) {
            $this->render('admin/resultat', [
                'succes'  => false,
                'message' => 'Échec : ' . $erreur,
                'retour'  => 'cond_form_trajet',
            ], 'Résultat');
            return;
        }

        $id = (new Trajet())->ajouter(
            (int) $villeDepart, (int) $villeArrivee, (int) $user['id'],
            (int) $vehiculeId, (float) $prix, $date, $heure
        );

        $this->render('admin/resultat', [
            'succes'  => true,
            'message' => "Votre trajet (id #$id) a été créé avec succès et est désormais actif.",
            'retour'  => 'cond_trajets',
        ], 'Résultat');
    }

    /** C4 : liste des passagers de l'un des trajets actifs du conducteur. */
    public function passagersTrajet(): void
    {
        $user = $this->garde();
        $trajetModel = new Trajet();
        $trajetsActifs = $trajetModel->actifsParConducteur((int) $user['id']);

        $trajetId = $_GET['trajet_id'] ?? ($_POST['trajet_id'] ?? null);
        $passagers = null;
        $trajetChoisi = null;

        if ($trajetId !== null && ctype_digit((string) $trajetId)) {
            $trajetChoisi = $trajetModel->trouverParId((int) $trajetId);
            // Sécurité : le trajet doit appartenir au conducteur et être actif.
            if ($trajetChoisi !== null
                && (int) $trajetChoisi['conducteur_id'] === (int) $user['id']
                && $trajetChoisi['statut'] === 'actif') {
                $passagers = (new Reservation())->passagersDuTrajet((int) $trajetId);
            } else {
                $trajetChoisi = null;
            }
        }

        $this->render('conducteur/passagers', [
            'trajetsActifs' => $trajetsActifs,
            'passagers'     => $passagers,
            'trajetChoisi'  => $trajetChoisi,
        ], 'Passagers de mes trajets actifs');
    }

    /**
     * C5 : clôture d'un trajet actif.
     * Passe le trajet en 'passif' ET règle les paiements : chaque réservation
     * débite le passager du prix du trajet et crédite le conducteur.
     */
    public function cloturerTrajet(): void
    {
        $user = $this->garde();
        $trajetModel      = new Trajet();
        $reservationModel = new Reservation();
        $utilisateurModel = new Utilisateur();

        $trajetsActifs = $trajetModel->actifsParConducteur((int) $user['id']);

        // GET : afficher la liste des trajets actifs à clôturer.
        if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
            $this->render('conducteur/cloturer', [
                'trajetsActifs' => $trajetsActifs,
                'flash'         => $this->flash(),
            ], 'Clôturer un trajet actif');
            return;
        }

        // POST : traiter la clôture.
        $trajetId = $_POST['trajet_id'] ?? '';
        $trajet = ctype_digit((string) $trajetId) ? $trajetModel->brutParId((int) $trajetId) : null;

        if ($trajet === null
            || (int) $trajet['conducteur_id'] !== (int) $user['id']
            || $trajet['statut'] !== 'actif') {
            $_SESSION['flash'] = 'Échec : trajet introuvable, non actif, ou ne vous appartenant pas.';
            $this->redirect('cond_cloturer');
            return;
        }

        // --- Paiements : une réservation = un trajet payé par le passager ---
        $reservations = $reservationModel->brutesParTrajet((int) $trajetId);
        $prix  = (float) $trajet['prix'];
        $total = 0.0;
        foreach ($reservations as $resa) {
            $utilisateurModel->ajusterSolde((int) $resa['passager_id'], -$prix); // débit passager
            $utilisateurModel->ajusterSolde((int) $user['id'], $prix);           // crédit conducteur
            $total += $prix;
        }

        $trajetModel->cloturer((int) $trajetId);

        $nb = count($reservations);
        $_SESSION['flash'] = sprintf(
            'Trajet #%d clôturé. %d réservation(s) facturée(s), %.2f € crédités sur votre compte.',
            (int) $trajetId, $nb, $total
        );
        $this->redirect('cond_trajets');
    }
}
