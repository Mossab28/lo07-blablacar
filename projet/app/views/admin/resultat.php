<div class="card <?= $succes ? 'text-bg-success' : 'text-bg-danger' ?> mb-3">
  <div class="card-header"><?= $succes ? 'Opération réussie' : 'Échec de l\'opération' ?></div>
  <div class="card-body">
    <p class="card-text"><?= htmlspecialchars($message) ?></p>
    <a class="btn btn-light" href="<?= BASE_URL ?>index.php?action=<?= htmlspecialchars($retour) ?>">Continuer</a>
  </div>
</div>
