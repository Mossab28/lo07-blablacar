<?php
$loginId = $_SESSION['login_id'] ?? -1;
$courant = null;
if ($loginId !== -1 && $loginId !== null) {
    $courant = (new Utilisateur())->trouverParId((int) $loginId);
}
function lien(string $action, string $libelle): string
{
    return '<a class="dropdown-item" href="' . BASE_URL . 'index.php?action=' . $action . '">' . htmlspecialchars($libelle) . '</a>';
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0">
            <strong><?= htmlspecialchars(NOMS_ETUDIANTS) ?></strong>
            <span class="mx-2">|</span>
            <?php if ($courant !== null): ?>
                <?= htmlspecialchars($courant['prenom'] . ' ' . $courant['nom']) ?>
                <span class="mx-2">|</span>
                <span class="badge bg-warning text-dark"><?= number_format((float) $courant['solde'], 2, '.', ' ') ?> €</span>
            <?php else: ?>
                <span class="text-white-50">Non connecté</span>
            <?php endif; ?>
        </span>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <?php if ($courant !== null && $courant['role'] === 'administrateur'): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Administrateur</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><?= lien('admin_utilisateurs', 'Liste des utilisateurs') ?></li>
                            <li><?= lien('admin_form_conducteur', "Ajout d'un conducteur") ?></li>
                            <li><?= lien('admin_form_passager', "Ajout d'un passager") ?></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><?= lien('admin_vehicules', 'Liste des véhicules') ?></li>
                            <li><?= lien('admin_form_vehicule', "Ajout d'un véhicule") ?></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><?= lien('admin_villes', 'Liste des villes') ?></li>
                            <li><?= lien('admin_form_ville', "Ajout d'une ville") ?></li>
                        </ul>
                    </li>
                <?php elseif ($courant !== null && $courant['role'] === 'conducteur'): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Conducteur</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><?= lien('cond_vehicules', 'Liste de mes véhicules') ?></li>
                            <li><?= lien('cond_trajets', 'Liste de tous mes trajets') ?></li>
                            <li><?= lien('cond_form_trajet', "Ajout d'un trajet") ?></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><?= lien('cond_passagers', "Passagers d'un trajet actif") ?></li>
                            <li><?= lien('cond_cloturer', "Clôturer un trajet actif") ?></li>
                        </ul>
                    </li>
                <?php elseif ($courant !== null && $courant['role'] === 'passager'): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Passager</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><?= lien('pass_reservations', 'Liste de mes réservations') ?></li>
                            <li><?= lien('pass_form_reserver', "Réservation d'un trajet actif") ?></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Innovations</a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><?= lien('innov_data', 'Innovation données') ?></li>
                        <li><?= lien('innov_mvc', 'Innovation MVC') ?></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Examinateur</a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><?= lien('exam_superglobales', 'SuperGlobales (Cookies / Sessions)') ?></li>
                        <li><?= lien('exam_reservations', 'Ajout de 10 réservations aléatoires') ?></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Se connecter</a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><?= lien('login', 'Login') ?></li>
                        <li><?= lien('logout', 'Déconnexion') ?></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header class="bg-primary bg-gradient text-white py-4 mb-4">
    <div class="container">
        <h1 class="display-6 fw-bold mb-1">Projet BlaBlaCar 2026</h1>
        <p class="mb-0">Mettez-vous bien avec le covoiturage au quotidien</p>
    </div>
</header>
