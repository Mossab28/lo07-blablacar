<div class="card">
  <div class="card-body bg-info">
    <h5 class="card-title">Formulaire de création d'un nouveau véhicule</h5>
    <div class="mx-lg-3 mt-3 bg-light p-3 rounded">
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
</div>
