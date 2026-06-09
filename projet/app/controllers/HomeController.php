<?php
/**
 * Contrôleur de la page d'accueil.
 */
class HomeController extends Controller
{
    public function index(): void
    {
        $this->render('home/accueil', [
            'flash' => $this->flash(),
        ], 'Accueil');
    }
}
