<div class="card">
  <div class="card-body bg-info">
    <h5 class="card-title">Liste des villes</h5>
    <div class="mx-lg-3 mt-3 bg-light p-3 rounded">
      <?php if (!empty($flash)): ?><div class="alert alert-primary"><?= htmlspecialchars($flash) ?></div><?php endif; ?>
      <table class="table table-striped table-bordered table-hover">
        <thead class="table-danger"><tr><th>Ville</th></tr></thead>
        <tbody>
          <?php foreach ($villes as $v): ?>
            <tr><td><?= htmlspecialchars(ucfirst($v['nom'])) ?></td></tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
