<?php
class ExaminateurController extends Controller
{
    public function superGlobales(): void
    {
        if (!isset($_COOKIE['blablacar_demo'])) {
            setcookie('blablacar_demo', 'visiteur_' . substr(md5(NOMS_ETUDIANTS), 0, 8), time() + 3600, BASE_URL);
        }

        $this->render('examinateur/superglobales', [
            'cookies'  => $_COOKIE,
            'sessions' => $_SESSION,
        ], 'SuperGlobales (Cookies et Sessions)');
    }

    public function reservationsAleatoires(): void
    {
        $trajetModel      = new Trajet();
        $utilisateurModel = new Utilisateur();
        $reservationModel = new Reservation();

        $trajetsActifs = $trajetModel->tousActifs();
        $passagers     = $utilisateurModel->passagers();

        $resultats = [];

        if (empty($trajetsActifs) || empty($passagers)) {
            $this->render('examinateur/reservations', [
                'resultats' => [],
                'erreur'    => 'Impossible : il faut au moins un trajet actif et un passager.',
            ], '10 réservations aléatoires');
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            $trajet   = $trajetsActifs[array_rand($trajetsActifs)];
            $passager = $passagers[array_rand($passagers)];

            $reservationModel->ajouter((int) $trajet['id'], (int) $passager['id']);

            $resultats[] = sprintf(
                'Nouvelle réservation sur le trajet %s --> %s par %s %s',
                $trajet['ville_depart'],
                $trajet['ville_arrivee'],
                $passager['prenom'],
                $passager['nom']
            );
        }

        $this->render('examinateur/reservations', [
            'resultats' => $resultats,
            'erreur'    => null,
        ], '10 réservations aléatoires');
    }
}
