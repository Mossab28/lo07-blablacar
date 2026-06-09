<div class="card">
    <h2><?= htmlspecialchars($titre) ?></h2>
    <form method="post" action="<?= BASE_URL ?>index.php?action=<?= htmlspecialchars($action) ?>">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" required>

        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" required>

        <label for="solde">Solde initial (€)</label>
        <input type="number" id="solde" name="solde" step="0.01" value="0" required>

        <p class="alert info" style="margin-top:1rem">
            Le login est généré automatiquement (prénom+nom) et le mot de passe
            par défaut est <code>secret</code>.
        </p>

        <button type="submit" class="btn">Ajouter</button>
    </form>
</div>
