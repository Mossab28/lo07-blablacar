<?php
/**
 * Contrôleur Passager (P1, P2).
 */
class PassagerController extends Controller
{
    private function garde(): array
    {
        return $this->exigerRole(['passager']);
    }

    /** P1 : liste des réservations du passager connecté. */
    public function mesReservations(): void
    {
        $user = $this->garde();
        $reservations = (new Reservation())->parPassager((int) $user['id']);
        $this->render('passager/reservations', [
            'reservations' => $reservations,
            'flash'        => $this->flash(),
        ], 'Mes réservations');
    }

    /** P2 : formulaire de réservation (liste des trajets actifs). */
    public function formReserver(): void
    {
        $this->garde();
        $trajetsActifs = (new Trajet())->tousActifs();
        $this->render('passager/reserver', [
            'trajetsActifs' => $trajetsActifs,
        ], 'Réserver un trajet actif');
    }

    /** P2 : traitement de la réservation d'un trajet actif. */
    public function reserver(): void
    {
        $user = $this->garde();
        $trajetId = $_POST['trajet_id'] ?? '';
        $trajet = ctype_digit((string) $trajetId)
            ? (new Trajet())->brutParId((int) $trajetId)
            : null;

        if ($trajet === null || $trajet['statut'] !== 'actif') {
            $_SESSION['flash'] = 'Échec : ce trajet n\'est pas disponible à la réservation.';
            $this->redirect('pass_form_reserver');
            return;
        }

        $id = (new Reservation())->ajouter((int) $trajetId, (int) $user['id']);
        $_SESSION['flash'] = "Réservation #$id confirmée sur le trajet #$trajetId.";
        $this->redirect('pass_reservations');
    }
}
