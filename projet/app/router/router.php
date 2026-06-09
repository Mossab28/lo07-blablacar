<?php
class Router
{
    private static array $routes = [

        'accueil'            => ['HomeController', 'index'],
        'login'              => ['AuthController', 'formulaire'],
        'authentifier'       => ['AuthController', 'authentifier'],
        'logout'             => ['AuthController', 'deconnexion'],

        'admin_utilisateurs'      => ['AdminController', 'listeUtilisateurs'],
        'admin_form_conducteur'   => ['AdminController', 'formConducteur'],
        'admin_ajout_conducteur'  => ['AdminController', 'ajouterConducteur'],
        'admin_form_passager'     => ['AdminController', 'formPassager'],
        'admin_ajout_passager'    => ['AdminController', 'ajouterPassager'],
        'admin_vehicules'         => ['AdminController', 'listeVehicules'],
        'admin_form_vehicule'     => ['AdminController', 'formVehicule'],
        'admin_ajout_vehicule'    => ['AdminController', 'ajouterVehicule'],
        'admin_villes'            => ['AdminController', 'listeVilles'],
        'admin_form_ville'        => ['AdminController', 'formVille'],
        'admin_ajout_ville'       => ['AdminController', 'ajouterVille'],

        'cond_vehicules'        => ['ConducteurController', 'mesVehicules'],
        'cond_trajets'          => ['ConducteurController', 'mesTrajets'],
        'cond_form_trajet'      => ['ConducteurController', 'formTrajet'],
        'cond_ajout_trajet'     => ['ConducteurController', 'ajouterTrajet'],
        'cond_passagers'        => ['ConducteurController', 'passagersTrajet'],
        'cond_cloturer'         => ['ConducteurController', 'cloturerTrajet'],

        'pass_reservations'     => ['PassagerController', 'mesReservations'],
        'pass_form_reserver'    => ['PassagerController', 'formReserver'],
        'pass_reserver'         => ['PassagerController', 'reserver'],

        'exam_superglobales'    => ['ExaminateurController', 'superGlobales'],
        'exam_reservations'     => ['ExaminateurController', 'reservationsAleatoires'],

        'innov_data'            => ['InnovationController', 'data'],
        'innov_mvc'             => ['InnovationController', 'mvc'],
    ];

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
