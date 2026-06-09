<h2 class="text-danger mb-3">Liste des utilisateurs</h2>
<?php if (!empty($flash)): ?><div class="alert alert-info"><?= htmlspecialchars($flash) ?></div><?php endif; ?>

<div class="table-responsive">
<table class="table table-striped table-hover table-bordered align-middle bg-white">
    <thead class="table-dark">
        <tr>
            <th>Nom</th><th>Prénom</th><th>Rôle</th>
            <th>Login</th><th>Mot de passe</th><th>Solde (€)</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($utilisateurs as $u): ?>
            <tr>
                <td><?= htmlspecialchars($u['nom']) ?></td>
                <td><?= htmlspecialchars($u['prenom']) ?></td>
                <td><span class="badge bg-primary"><?= htmlspecialchars($u['role']) ?></span></td>
                <td><?= htmlspecialchars($u['login']) ?></td>
                <td><?= htmlspecialchars($u['password']) ?></td>
                <td><?= number_format((float) $u['solde'], 2, '.', ' ') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
