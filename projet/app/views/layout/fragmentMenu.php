<?php
$loginId = $_SESSION['login_id'] ?? -1;
$courant = null;
if ($loginId !== -1 && $loginId !== null) {
    $courant = (new Utilisateur())->trouverParId((int) $loginId);
}

function lien(string $action, string $libelle): string
{
    return '<a href="' . BASE_URL . 'index.php?action=' . $action . '">' . htmlspecialchars($libelle) . '</a>';
}
?>
<nav class="menubar">
    <div class="menubar-brand">
        <span class="etudiants"><?= htmlspecialchars(NOMS_ETUDIANTS) ?></span>
        <span class="sep">|</span>
        <?php if ($courant !== null): ?>
            <span class="user"><?= htmlspecialchars($courant['prenom'] . ' ' . $courant['nom']) ?></span>
            <span class="sep">|</span>
            <span class="solde"><?= number_format((float) $courant['solde'], 2, '.', ' ') ?> €</span>
        <?php else: ?>
            <span class="user">Non connecté</span>
        <?php endif; ?>
    </div>

    <ul class="menubar-nav">
        <?php if ($courant !== null && $courant['role'] === 'administrateur'): ?>
            <li class="dropdown">
                <span class="dropbtn">Administrateur ▾</span>
                <div class="dropdown-content">
                    <?= lien('admin_utilisateurs',     'Liste des utilisateurs') ?>
                    <?= lien('admin_form_conducteur',  "Ajout d'un conducteur") ?>
                    <?= lien('admin_form_passager',    "Ajout d'un passager") ?>
                    <hr>
                    <?= lien('admin_vehicules',        'Liste des véhicules') ?>
                    <?= lien('admin_form_vehicule',    "Ajout d'un véhicule") ?>
                    <hr>
                    <?= lien('admin_villes',           'Liste des villes') ?>
                    <?= lien('admin_form_ville',       "Ajout d'une ville") ?>
                </div>
            </li>
        <?php elseif ($courant !== null && $courant['role'] === 'conducteur'): ?>
            <li class="dropdown">
                <span class="dropbtn">Conducteur ▾</span>
                <div class="dropdown-content">
                    <?= lien('cond_vehicules',  'Liste de mes véhicules') ?>
                    <?= lien('cond_trajets',    'Liste de tous mes trajets') ?>
                    <?= lien('cond_form_trajet',"Ajout d'un trajet") ?>
                    <hr>
                    <?= lien('cond_passagers',  "Passagers d'un trajet actif") ?>
                    <?= lien('cond_cloturer',   "Clôturer un trajet actif") ?>
                </div>
            </li>
        <?php elseif ($courant !== null && $courant['role'] === 'passager'): ?>
            <li class="dropdown">
                <span class="dropbtn">Passager ▾</span>
                <div class="dropdown-content">
                    <?= lien('pass_reservations',  'Liste de mes réservations') ?>
                    <?= lien('pass_form_reserver', "Réservation d'un trajet actif") ?>
                </div>
            </li>
        <?php endif; ?>

        <li class="dropdown">
            <span class="dropbtn">Innovations ▾</span>
            <div class="dropdown-content">
                <?= lien('innov_data', 'Innovation données') ?>
                <?= lien('innov_mvc',  'Innovation MVC') ?>
            </div>
        </li>
        <li class="dropdown">
            <span class="dropbtn">Examinateur ▾</span>
            <div class="dropdown-content">
                <?= lien('exam_superglobales', 'SuperGlobales (Cookies / Sessions)') ?>
                <?= lien('exam_reservations',  'Ajout de 10 réservations aléatoires') ?>
            </div>
        </li>
        <li class="dropdown">
            <span class="dropbtn">Se connecter ▾</span>
            <div class="dropdown-content">
                <?= lien('login',  'Login') ?>
                <?= lien('logout', 'Déconnexion') ?>
            </div>
        </li>
    </ul>
</nav>

<header class="bandeau">
    <h1>Projet BlaBlaCar 2026</h1>
    <p>Mettez-vous bien avec le covoiturage au quotidien</p>
</header>
