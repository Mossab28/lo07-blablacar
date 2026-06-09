<?php
/**
 * Contrôleur de base : utilitaires communs à tous les contrôleurs.
 *
 * - render()      : rend une vue dans le gabarit commun (header + menu + footer)
 * - redirect()    : redirige vers une action du routeur
 * - utilisateurConnecte() / exigerRole() : gestion de la session et des accès
 */
abstract class Controller
{
    /**
     * Rend une vue en l'enveloppant dans le gabarit principal.
     *
     * @param string $vue    Chemin relatif depuis app/views (ex: 'admin/utilisateurs')
     * @param array  $data   Variables extraites et rendues disponibles dans la vue
     * @param string $titre  Titre du sous-bloc (affiché sous le bandeau)
     */
    protected function render(string $vue, array $data = [], string $titre = ''): void
    {
        extract($data, EXTR_SKIP);
        $contenuVue = VIEWS_PATH . '/' . $vue . '.php';

        require VIEWS_PATH . '/layout/header.php';
        require VIEWS_PATH . '/layout/fragmentMenu.php';
        echo '<main class="container">';
        require $contenuVue;
        echo '</main>';
        require VIEWS_PATH . '/layout/footer.php';
    }

    /** Redirige vers une action du routeur, puis stoppe le script. */
    protected function redirect(string $action): void
    {
        header('Location: ' . BASE_URL . 'index.php?action=' . $action);
        exit;
    }

    /** Retourne l'utilisateur connecté (tableau) ou null si personne. */
    protected function utilisateurConnecte(): ?array
    {
        $id = $_SESSION['login_id'] ?? -1;
        if ($id === -1 || $id === null) {
            return null;
        }
        return (new Utilisateur())->trouverParId((int) $id);
    }

    /**
     * Garde d'accès : exige une session avec l'un des rôles autorisés.
     * Redirige vers le formulaire de connexion sinon.
     */
    protected function exigerRole(array $rolesAutorises): array
    {
        $user = $this->utilisateurConnecte();
        if ($user === null || !in_array($user['role'], $rolesAutorises, true)) {
            $_SESSION['flash'] = "Accès refusé : veuillez vous connecter avec le rôle approprié.";
            $this->redirect('login');
        }
        return $user;
    }

    /** Récupère un message flash (one-shot) et le retire de la session. */
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
