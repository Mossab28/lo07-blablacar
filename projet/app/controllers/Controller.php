<?php
abstract class Controller
{
    protected function render(string $vue, array $data = [], string $titre = ''): void
    {
        extract($data, EXTR_SKIP);
        $contenuVue = VIEWS_PATH . '/' . $vue . '.php';

        require VIEWS_PATH . '/layout/header.php';
        require VIEWS_PATH . '/layout/fragmentMenu.php';
        echo '<main class="container flex-grow-1 pb-4">';
        require $contenuVue;
        echo '</main>';
        require VIEWS_PATH . '/layout/footer.php';
    }

    protected function redirect(string $action): void
    {
        header('Location: ' . BASE_URL . 'index.php?action=' . $action);
        exit;
    }

    protected function utilisateurConnecte(): ?array
    {
        $id = $_SESSION['login_id'] ?? -1;
        if ($id === -1 || $id === null) {
            return null;
        }
        return (new Utilisateur())->trouverParId((int) $id);
    }

    protected function exigerRole(array $rolesAutorises): array
    {
        $user = $this->utilisateurConnecte();
        if ($user === null || !in_array($user['role'], $rolesAutorises, true)) {
            $_SESSION['flash'] = "Accès refusé : veuillez vous connecter avec le rôle approprié.";
            $this->redirect('login');
        }
        return $user;
    }

    protected function flash(): ?string
    {
        if (!empty($_SESSION['flash'])) {
            $msg = $_SESSION['flash'];
            unset($_SESSION['flash']);
            return $msg;
        }
        return null;
    }
}
