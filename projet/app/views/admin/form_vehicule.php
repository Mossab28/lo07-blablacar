<div class="card shadow-sm mx-auto" style="max-width:560px;">
    <div class="card-body">
        <h2 class="card-title text-danger mb-3">Formulaire de création d'un nouveau véhicule</h2>
        <form method="post" action="<?= BASE_URL ?>index.php?action=admin_ajout_vehicule">
            <div class="mb-3">
                <label for="marque" class="form-label">Marque</label>
                <input type="text" class="form-control" id="marque" name="marque" required>
            </div>
            <div class="mb-3">
                <label for="modele" class="form-label">Modèle</label>
                <input type="text" class="form-control" id="modele" name="modele" required>
            </div>
            <div class="mb-3">
                <label for="annee" class="form-label">Année</label>
                <input type="number" class="form-control" id="annee" name="annee" min="1950" max="2030" required>
            </div>
            <div class="mb-3">
                <label for="immatriculation" class="form-label">Immatriculation</label>
                <input type="text" class="form-control" id="immatriculation" name="immatriculation" placeholder="ab-123-cd" required>
            </div>
            <div class="mb-3">
                <label for="proprietaire_id" class="form-label">Sélectionner un propriétaire (conducteur)</label>
                <select class="form-select" id="proprietaire_id" name="proprietaire_id" required>
                    <?php foreach ($conducteurs as $c): ?>
                        <option value="<?= (int) $c['id'] ?>"><?= htmlspecialchars($c['prenom'] . ' ' . $c['nom']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</div>
