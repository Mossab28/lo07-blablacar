<?php
$loginId = $_SESSION['login_id'] ?? -1;
$courant = null;
if ($loginId !== -1 && $loginId !== null) {
    $courant = (new Utilisateur())->trouverParId((int) $loginId);
}
function lien(string $action, string $libelle): string
{
    return '<li><a class="dropdown-item" href="' . BASE_URL . 'index.php?action=' . $action . '">' . htmlspecialchars($libelle) . '</a></li>';
}
?>

<nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="<?= BASE_URL ?>index.php?action=accueil">
      <strong><?= htmlspecialchars(NOMS_ETUDIANTS) ?></strong>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php if ($courant !== null && $courant['role'] === 'administrateur'): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Administrateur</a>
            <ul class="dropdown-menu">
              <?= lien('admin_utilisateurs', 'Liste des utilisateurs') ?>
              <?= lien('admin_form_conducteur', "Ajout d'un conducteur") ?>
              <?= lien('admin_form_passager', "Ajout d'un passager") ?>
              <li><hr class="dropdown-divider"></li>
              <?= lien('admin_vehicules', 'Liste des véhicules') ?>
              <?= lien('admin_form_vehicule', "Ajout d'un véhicule") ?>
              <li><hr class="dropdown-divider"></li>
              <?= lien('admin_villes', 'Liste des villes') ?>
              <?= lien('admin_form_ville', "Ajout d'une ville") ?>
            </ul>
          </li>
        <?php elseif ($courant !== null && $courant['role'] === 'conducteur'): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Conducteur</a>
            <ul class="dropdown-menu">
              <?= lien('cond_vehicules', 'Liste de mes véhicules') ?>
              <?= lien('cond_trajets', 'Liste de tous mes trajets') ?>
              <?= lien('cond_form_trajet', "Ajout d'un trajet") ?>
              <li><hr class="dropdown-divider"></li>
              <?= lien('cond_passagers', "Passagers d'un trajet actif") ?>
              <?= lien('cond_cloturer', "Clôturer un trajet actif") ?>
            </ul>
          </li>
        <?php elseif ($courant !== null && $courant['role'] === 'passager'): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Passager</a>
            <ul class="dropdown-menu">
              <?= lien('pass_reservations', 'Liste de mes réservations') ?>
              <?= lien('pass_form_reserver', "Réservation d'un trajet actif") ?>
            </ul>
          </li>
        <?php endif; ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <?= lien('innov_data', 'Innovation données') ?>
            <?= lien('innov_mvc', 'Innovation MVC') ?>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Examinateur</a>
          <ul class="dropdown-menu">
            <?= lien('exam_superglobales', 'SuperGlobales (Cookies / Sessions)') ?>
            <?= lien('exam_reservations', 'Ajout de 10 réservations aléatoires') ?>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
          <ul class="dropdown-menu">
            <?= lien('login', 'Login') ?>
            <?= lien('logout', 'Déconnexion') ?>
          </ul>
        </li>
      </ul>

      <span class="navbar-text text-white">
        <?php if ($courant !== null): ?>
          <strong><?= htmlspecialchars($courant['prenom'] . ' ' . $courant['nom']) ?></strong>
          | <span class="badge bg-warning text-dark"><?= number_format((float) $courant['solde'], 2, '.', ' ') ?> €</span>
        <?php else: ?>
          Non connecté
        <?php endif; ?>
      </span>
    </div>
  </div>
</nav>

<div class="container">

  <div class="mt-4 p-5 bg-primary text-white rounded">
    <h1>Projet BlaBlaCar 2026</h1>
    <p>Mettez-vous bien avec le covoiturage au quotidien</p>
  </div>
  <p></p>
