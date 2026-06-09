<div class="card">
  <div class="card-body bg-info">
    <h5 class="card-title">Innovation données — Tableau de bord du covoiturage</h5>
    <h6 class="card-subtitle mb-2 text-muted">Exploitation originale des données existantes</h6>
    <div class="mx-lg-3 mt-3 bg-light p-3 rounded">
      <div class="alert alert-primary">
        Indicateurs : <strong><?= (int) $stats['total_trajets'] ?></strong> trajets,
        <strong><?= (int) $stats['trajets_actifs'] ?></strong> actifs,
        <strong><?= (int) $stats['total_resa'] ?></strong> réservations,
        prix moyen <strong><?= number_format((float) $stats['prix_moyen'], 2) ?> €</strong>,
        volume d'affaires <strong><?= number_format((float) $stats['volume_affaires'], 2) ?> €</strong>.
      </div>

      <h6 class="mt-4">Top 5 des conducteurs les plus actifs</h6>
      <table class="table table-striped table-bordered table-hover">
        <thead class="table-danger"><tr><th>Conducteur</th><th>Trajets proposés</th></tr></thead>
        <tbody>
          <?php foreach ($topConducteurs as $c): ?>
            <tr><td><?= htmlspecialchars($c['conducteur']) ?></td><td><?= (int) $c['nb'] ?></td></tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <h6 class="mt-4">Top 5 des lignes les plus réservées</h6>
      <table class="table table-striped table-bordered table-hover mb-0">
        <thead class="table-danger"><tr><th>Ligne</th><th>Réservations</th><th>Prix (€)</th></tr></thead>
        <tbody>
          <?php foreach ($topTrajets as $t): ?>
            <tr>
              <td><?= htmlspecialchars($t['ligne']) ?></td>
              <td><?= (int) $t['nb_resa'] ?></td>
              <td><?= number_format((float) $t['prix'], 2) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
