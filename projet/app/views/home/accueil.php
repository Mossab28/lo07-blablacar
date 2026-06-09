<?php if (!empty($flash)): ?>
    <div class="alert alert-info"><?= htmlspecialchars($flash) ?></div>
<?php endif; ?>

<h2 class="text-danger mb-3">Bienvenue sur BlaBlaCar 2026</h2>
<p class="lead">
    Application de covoiturage réalisée dans le cadre du projet LO07, selon
    l'architecture <strong>MVC</strong> (Modèle-Vue-Contrôleur). Connectez-vous
    pour accéder aux fonctionnalités correspondant à votre rôle.
</p>

<div class="row g-3 mt-2">
    <div class="col-md-4">
        <a class="text-decoration-none" href="<?= BASE_URL ?>index.php?action=login">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary">Se connecter</h5>
                    <p class="card-text text-muted">Administrateur, conducteur ou passager.</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a class="text-decoration-none" href="<?= BASE_URL ?>index.php?action=innov_data">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary">Innovation données</h5>
                    <p class="card-text text-muted">Tableau de bord du covoiturage.</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-4">
        <a class="text-decoration-none" href="<?= BASE_URL ?>index.php?action=exam_superglobales">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary">Examinateur</h5>
                    <p class="card-text text-muted">Superglobales &amp; réservations aléatoires.</p>
                </div>
            </div>
        </a>
    </div>
</div>

<div class="alert alert-info mt-4">
    <strong>Comptes de test</strong> (mot de passe : <code>secret</code>) —
    Administrateur : <code>boss</code> · Conducteur : <code>trisprior</code> · Passager : <code>calebprior</code>
</div>
