<?php
/**
 * Contrôleur d'authentification (F1 Login, F2 Déconnexion).
 */
class AuthController extends Controller
{
    /** F1 : affiche le formulaire de connexion. */
    public function formulaire(): void
    {
        $this->render('auth/login', [
            'flash' => $this->flash(),
        ], 'Connexion');
    }

    /** F1 : traite le formulaire et ouvre la session si succès. */
    public function authentifier(): void
    {
        $login    = trim($_POST['login'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = (new Utilisateur())->authentifier($login, $password);

        if ($user === null) {
            $_SESSION['login_id'] = -1;
            $_SESSION['flash'] = 'Identifiants incorrects. Veuillez réessayer.';
            $this->redirect('login');
        }

        // Session ouverte : on mémorise l'id de l'utilisateur connecté.
        $_SESSION['login_id'] = (int) $user['id'];

        // Redirection vers le menu correspondant au rôle.
        switch ($user['role']) {
            case 'administrateur':
                $this->redirect('admin_utilisateurs');
                break;
            case 'conducteur':
                $this->redirect('cond_trajets');
                break;
            case 'passager':
                $this->redirect('pass_reservations');
                break;
            default:
                $this->redirect('accueil');
        }
    }

    /** F2 : déconnexion — réinitialise login_id. */
    public function deconnexion(): void
    {
        $_SESSION['login_id'] = -1;
        $_SESSION['flash'] = 'Vous êtes déconnecté.';
        $this->redirect('accueil');
    }
}
