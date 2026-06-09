<div class="card">
  <div class="card-body bg-info">
    <h5 class="card-title">Liste des véhicules du conducteur <?= htmlspecialchars($conducteur['prenom'] . ' ' . $conducteur['nom']) ?></h5>
    <div class="mx-lg-3 mt-3 bg-light p-3 rounded">
      <?php if (empty($vehicules)): ?>
        <div class="alert alert-primary mb-0">Vous n'avez aucun véhicule enregistré.</div>
      <?php else: ?>
      <table class="table table-striped table-bordered table-hover">
        <thead class="table-danger"><tr><th>Marque</th><th>Modèle</th><th>Année</th><th>Immatriculation</th></tr></thead>
        <tbody>
          <?php foreach ($vehicules as $v): ?>
            <tr>
              <td><?= htmlspecialchars($v['marque']) ?></td>
              <td><?= htmlspecialchars($v['modele']) ?></td>
              <td><?= (int) $v['annee'] ?></td>
              <td><?= htmlspecialchars($v['immatriculation']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php endif; ?>
    </div>
  </div>
</div>
