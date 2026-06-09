<?php
/**
 * Routeur : table de correspondance action -> (contrôleur, méthode).
 *
 * Le point d'entrée index.php appelle Router::dispatch() avec la valeur
 * du paramètre 'action'. Chaque action est associée à une méthode d'un
 * contrôleur. On reste volontairement explicite (pas de magie) pour que
 * la liste des fonctionnalités du cahier des charges soit lisible d'un coup.
 */
class Router
{
    /**
     * Carte des routes. Clé = action ; valeur = [Contrôleur, méthode].
     */
    private static array $routes = [
        // --- Accueil / connexion ---
        'accueil'            => ['HomeController', 'index'],
        'login'              => ['AuthController', 'formulaire'],
        'authentifier'       => ['AuthController', 'authentifier'],
        'logout'             => ['AuthController', 'deconnexion'],

        // --- Administrateur (A1..A7) ---
        'admin_utilisateurs'      => ['AdminController', 'listeUtilisateurs'],     // A1
        'admin_form_conducteur'   => ['AdminController', 'formConducteur'],        // A2
        'admin_ajout_conducteur'  => ['AdminController', 'ajouterConducteur'],     // A2
        'admin_form_passager'     => ['AdminController', 'formPassager'],          // A3
        'admin_ajout_passager'    => ['AdminController', 'ajouterPassager'],       // A3
        'admin_vehicules'         => ['AdminController', 'listeVehicules'],        // A4
        'admin_form_vehicule'     => ['AdminController', 'formVehicule'],          // A5
        'admin_ajout_vehicule'    => ['AdminController', 'ajouterVehicule'],       // A5
        'admin_villes'            => ['AdminController', 'listeVilles'],           // A6
        'admin_form_ville'        => ['AdminController', 'formVille'],             // A7
        'admin_ajout_ville'       => ['AdminController', 'ajouterVille'],          // A7

        // --- Conducteur (C1..C5) ---
        'cond_vehicules'        => ['ConducteurController', 'mesVehicules'],       // C1
        'cond_trajets'          => ['ConducteurController', 'mesTrajets'],         // C2
        'cond_form_trajet'      => ['ConducteurController', 'formTrajet'],         // C3
        'cond_ajout_trajet'     => ['ConducteurController', 'ajouterTrajet'],      // C3
        'cond_passagers'        => ['ConducteurController', 'passagersTrajet'],    // C4
        'cond_cloturer'         => ['ConducteurController', 'cloturerTrajet'],     // C5

        // --- Passager (P1, P2) ---
        'pass_reservations'     => ['PassagerController', 'mesReservations'],      // P1
        'pass_form_reserver'    => ['PassagerController', 'formReserver'],         // P2
        'pass_reserver'         => ['PassagerController', 'reserver'],             // P2

        // --- Examinateur (E1, E2) ---
        'exam_superglobales'    => ['ExaminateurController', 'superGlobales'],     // E1
        'exam_reservations'     => ['ExaminateurController', 'reservationsAleatoires'], // E2

        // --- Innovations ---
        'innov_data'            => ['InnovationController', 'data'],
        'innov_mvc'             => ['InnovationController', 'mvc'],
    ];

    /** Aiguille la requête vers le bon contrôleur, ou l'accueil par défaut. */
    public static function dispatch(string $action): void
    {
        if (!isset(self::$routes[$action])) {
            $action = 'accueil';
        }

        [$controllerName, $method] = self::$routes[$action];

        $controllerFile = APP_PATH . '/controllers/' . $controllerName . '.php';
        require_once $controllerFile;

        $controller = new $controllerName();
        $controller->$method();
    }
}
