<?php /** A6 : liste des villes. */ ?>
<h2 class="section-titre">Liste des villes</h2>
<?php if (!empty($flash)): ?><div class="alert info"><?= htmlspecialchars($flash) ?></div><?php endif; ?>
<table class="data">
    <thead><tr><th>Ville</th></tr></thead>
    <tbody>
        <?php foreach ($villes as $v): ?>
            <tr><td><?= htmlspecialchars(ucfirst($v['nom'])) ?></td></tr>
        <?php endforeach; ?>
    </tbody>
</table>
