<h2 class="text-danger mb-3">Résultat de l'opération</h2>
<div class="alert <?= $succes ? 'alert-success' : 'alert-danger' ?>">
    <?= htmlspecialchars($message) ?>
</div>
<a class="btn btn-outline-primary" href="<?= BASE_URL ?>index.php?action=<?= htmlspecialchars($retour) ?>">Continuer</a>
