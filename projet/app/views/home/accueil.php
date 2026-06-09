<?php if (!empty($flash)): ?>
    <div class="alert info"><?= htmlspecialchars($flash) ?></div>
<?php endif; ?>

<h2 class="section-titre">Bienvenue sur BlaBlaCar 2026</h2>
<p>
    Application de covoiturage réalisée dans le cadre du projet LO07, selon
    l'architecture <strong>MVC</strong> (Modèle-Vue-Contrôleur).
    Connectez-vous pour accéder aux fonctionnalités correspondant à votre rôle.
</p>

<div class="home-grid">
    <a class="tuile" href="<?= BASE_URL ?>index.php?action=login">
        <h3>Se connecter</h3>
        <p>Administrateur, conducteur ou passager.</p>
    </a>
    <a class="tuile" href="<?= BASE_URL ?>index.php?action=innov_data">
        <h3>Innovation données</h3>
        <p>Tableau de bord du covoiturage.</p>
    </a>
    <a class="tuile" href="<?= BASE_URL ?>index.php?action=exam_superglobales">
        <h3>Examinateur</h3>
        <p>Superglobales &amp; réservations aléatoires.</p>
    </a>
</div>

<div class="alert info" style="margin-top:1.5rem">
    <strong>Comptes de test</strong> (mot de passe : <code>secret</code>) —
    Administrateur : <code>boss</code> · Conducteur : <code>trisprior</code> · Passager : <code>calebprior</code>
</div>
