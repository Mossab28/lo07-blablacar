<h2 class="section-titre">Liste des utilisateurs</h2>
<?php if (!empty($flash)): ?><div class="alert info"><?= htmlspecialchars($flash) ?></div><?php endif; ?>

<table class="data">
    <thead>
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
                <td><span class="badge role"><?= htmlspecialchars($u['role']) ?></span></td>
                <td><?= htmlspecialchars($u['login']) ?></td>
                <td><?= htmlspecialchars($u['password']) ?></td>
                <td><?= number_format((float) $u['solde'], 2, '.', ' ') ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
