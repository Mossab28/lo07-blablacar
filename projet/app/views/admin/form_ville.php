<div class="card">
  <div class="card-body bg-info">
    <h5 class="card-title">Formulaire d'ajout d'une nouvelle ville</h5>
    <div class="mx-lg-3 mt-3 bg-light p-3 rounded">
      <form method="post" action="<?= BASE_URL ?>index.php?action=admin_ajout_ville">
        <div class="mb-3">
          <label for="nom" class="form-label">Nom de la ville</label>
          <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
    </div>
  </div>
</div>
