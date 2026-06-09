<?php
class AuthController extends Controller
{
    public function formulaire(): void
    {
        $this->render('auth/login', [
            'flash' => $this->flash(),
        ], 'Connexion');
    }

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

        $_SESSION['login_id'] = (int) $user['id'];

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

    public function deconnexion(): void
    {
        $_SESSION['login_id'] = -1;
        $_SESSION['flash'] = 'Vous êtes déconnecté.';
        $this->redirect('accueil');
    }
}
