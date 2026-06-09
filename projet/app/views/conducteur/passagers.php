<div class="card">
  <div class="card-body bg-info">
    <h5 class="card-title">Sélectionnez l'un de mes trajets actifs</h5>
    <div class="mx-lg-3 mt-3 bg-light p-3 rounded">
      <?php if (empty($trajetsActifs)): ?>
        <div class="alert alert-primary mb-0">Vous n'avez aucun trajet actif.</div>
      <?php else: ?>
        <form method="get" action="<?= BASE_URL ?>index.php">
          <input type="hidden" name="action" value="cond_passagers">
          <?php foreach ($trajetsActifs as $t): ?>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="trajet_id" id="t<?= (int) $t['id'] ?>" value="<?= (int) $t['id'] ?>"
                <?= ($trajetChoisi && (int) $trajetChoisi['id'] === (int) $t['id']) ? 'checked' : '' ?>>
              <label class="form-check-label" for="t<?= (int) $t['id'] ?>">
                <?= htmlspecialchars(ucfirst($t['ville_depart']) . ' vers ' . ucfirst($t['ville_arrivee']) . ' le ' . $t['date_depart'] . ' à ' . $t['heure_depart']) ?>
              </label>
            </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-primary mt-2">Afficher les passagers</button>
        </form>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php if ($trajetChoisi !== null): ?>
<div class="card mt-3">
  <div class="card-body bg-info">
    <h5 class="card-title">Passagers du trajet <?= htmlspecialchars(ucfirst($trajetChoisi['ville_depart']) . ' → ' . ucfirst($trajetChoisi['ville_arrivee'])) ?></h5>
    <div class="mx-lg-3 mt-3 bg-light p-3 rounded">
      <?php if (empty($passagers)): ?>
        <div class="alert alert-primary mb-0">Aucun passager n'a encore réservé ce trajet.</div>
      <?php else: ?>
      <table class="table table-striped table-bordered table-hover">
        <thead class="table-danger"><tr><th>Passager</th><th>Login</th><th>Solde (€)</th></tr></thead>
        <tbody>
          <?php foreach ($passagers as $p): ?>
            <tr>
              <td><?= htmlspecialchars($p['passager']) ?></td>
              <td><?= htmlspecialchars($p['login']) ?></td>
              <td><?= number_format((float) $p['solde'], 2, '.', ' ') ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <?php endif; ?>
    </div>
  </div>
</div>
<?php endif; ?>
