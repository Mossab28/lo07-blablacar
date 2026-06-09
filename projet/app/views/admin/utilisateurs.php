<div class="card">
  <div class="card-body bg-info">
    <h5 class="card-title">Liste des utilisateurs</h5>
    <div class="mx-lg-3 mt-3 bg-light p-3 rounded">
      <?php if (!empty($flash)): ?><div class="alert alert-primary"><?= htmlspecialchars($flash) ?></div><?php endif; ?>
      <table class="table table-striped table-bordered table-hover">
        <thead class="table-danger">
          <tr><th>Nom</th><th>Prénom</th><th>Rôle</th><th>Login</th><th>Mot de passe</th><th>Solde (€)</th></tr>
        </thead>
        <tbody>
          <?php foreach ($utilisateurs as $u): ?>
            <tr>
              <td><?= htmlspecialchars($u['nom']) ?></td>
              <td><?= htmlspecialchars($u['prenom']) ?></td>
              <td><?= htmlspecialchars($u['role']) ?></td>
              <td><?= htmlspecialchars($u['login']) ?></td>
              <td><?= htmlspecialchars($u['password']) ?></td>
              <td><?= number_format((float) $u['solde'], 2, '.', ' ') ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
