<div class="card">
  <div class="card-body bg-info">
    <h5 class="card-title"><?= htmlspecialchars($titre) ?></h5>
    <div class="mx-lg-3 mt-3 bg-light p-3 rounded">
      <form method="post" action="<?= BASE_URL ?>index.php?action=<?= htmlspecialchars($action) ?>">
        <div class="mb-3">
          <label for="nom" class="form-label">Nom</label>
          <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
          <label for="prenom" class="form-label">Prénom</label>
          <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>
        <div class="mb-3">
          <label for="solde" class="form-label">Solde initial (€)</label>
          <input type="number" class="form-control" id="solde" name="solde" step="0.01" value="0" required>
        </div>
        <p class="text-muted">Le login est généré automatiquement (prénom+nom) et le mot de passe par défaut est <code>secret</code>.</p>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
    </div>
  </div>
</div>
