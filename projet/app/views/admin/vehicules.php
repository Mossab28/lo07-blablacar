<div class="card">
  <div class="card-body bg-info">
    <h5 class="card-title">Liste des véhicules</h5>
    <div class="mx-lg-3 mt-3 bg-light p-3 rounded">
      <table class="table table-striped table-bordered table-hover">
        <thead class="table-danger">
          <tr><th>Marque</th><th>Modèle</th><th>Année</th><th>Immatriculation</th><th>Propriétaire</th></tr>
        </thead>
        <tbody>
          <?php foreach ($vehicules as $v): ?>
            <tr>
              <td><?= htmlspecialchars($v['marque']) ?></td>
              <td><?= htmlspecialchars($v['modele']) ?></td>
              <td><?= (int) $v['annee'] ?></td>
              <td><?= htmlspecialchars($v['immatriculation']) ?></td>
              <td><?= htmlspecialchars($v['proprietaire']) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
