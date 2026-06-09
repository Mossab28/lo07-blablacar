<div class="card">
  <div class="card-body bg-info">
    <h5 class="card-title">10 nouvelles réservations aléatoires</h5>
    <div class="mx-lg-3 mt-3 bg-light p-3 rounded">
      <?php if (!empty($erreur)): ?>
        <div class="alert alert-danger mb-0"><?= htmlspecialchars($erreur) ?></div>
      <?php else: ?>
        <ol>
          <?php foreach ($resultats as $ligne): ?>
            <li><?= htmlspecialchars($ligne) ?></li>
          <?php endforeach; ?>
        </ol>
        <a class="btn btn-primary" href="<?= BASE_URL ?>index.php?action=exam_reservations">Recommencer</a>
      <?php endif; ?>
    </div>
  </div>
</div>
