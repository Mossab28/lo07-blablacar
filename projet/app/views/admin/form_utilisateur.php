<div class="card shadow-sm mx-auto" style="max-width:560px;">
    <div class="card-body">
        <h2 class="card-title text-danger mb-3"><?= htmlspecialchars($titre) ?></h2>
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
            <div class="alert alert-info">
                Le login est généré automatiquement (prénom+nom) et le mot de passe par défaut est <code>secret</code>.
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</div>
