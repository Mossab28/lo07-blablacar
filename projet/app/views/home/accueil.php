<?php if (!empty($flash)): ?>
  <div class="alert alert-primary"><?= htmlspecialchars($flash) ?></div>
<?php endif; ?>

<div class="card">
  <div class="card-body bg-info">
    <h5 class="card-title">Bienvenue sur BlaBlaCar 2026</h5>
    <h6 class="card-subtitle mb-2 text-muted">Application de covoiturage - architecture MVC</h6>
    <div class="mx-lg-3 mt-3 bg-light p-3 rounded">
      <p>
        Application de covoiturage réalisée dans le cadre du projet LO07, selon
        l'architecture <strong>MVC</strong> (Modèle-Vue-Contrôleur). Connectez-vous
        pour accéder aux fonctionnalités correspondant à votre rôle.
      </p>
      <p class="mb-0">
        <strong>Comptes de test</strong> (mot de passe : <code>secret</code>) —
        Administrateur : <code>boss</code> · Conducteur : <code>trisprior</code> · Passager : <code>calebprior</code>
      </p>
    </div>
  </div>
</div>
