<div class="card">
  <div class="card-body bg-info">
    <h5 class="card-title">Clôturer l'un de mes trajets actifs</h5>
    <div class="mx-lg-3 mt-3 bg-light p-3 rounded">
      <?php if (!empty($flash)): ?><div class="alert alert-primary"><?= htmlspecialchars($flash) ?></div><?php endif; ?>
      <p>
        La clôture passe le trajet en statut <strong>passif</strong>, empêche de
        nouvelles réservations et déclenche les paiements : chaque passager ayant
        réservé est débité du prix du trajet, et votre compte est crédité d'autant.
      </p>
      <?php if (empty($trajetsActifs)): ?>
        <div class="alert alert-primary mb-0">Vous n'avez aucun trajet actif à clôturer.</div>
      <?php else: ?>
        <form method="post" action="<?= BASE_URL ?>index.php?action=cond_cloturer">
          <?php foreach ($trajetsActifs as $t): ?>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="trajet_id" id="c<?= (int) $t['id'] ?>" value="<?= (int) $t['id'] ?>" required>
              <label class="form-check-label" for="c<?= (int) $t['id'] ?>">
                <?= htmlspecialchars(ucfirst($t['ville_depart']) . ' vers ' . ucfirst($t['ville_arrivee']) . ' le ' . $t['date_depart'] . ' à ' . $t['heure_depart'] . ' (' . number_format((float) $t['prix'], 2) . ' €)') ?>
              </label>
            </div>
          <?php endforeach; ?>
          <button type="submit" class="btn btn-danger mt-2">Clôturer ce trajet</button>
        </form>
      <?php endif; ?>
    </div>
  </div>
</div>
