<h2 class="section-titre">Liste des véhicules</h2>
<table class="data">
    <thead>
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
