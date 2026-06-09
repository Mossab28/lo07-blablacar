<?php /** C1 : véhicules du conducteur connecté. */ ?>
<h2 class="section-titre">Liste des véhicules du conducteur <?= htmlspecialchars($conducteur['prenom'] . ' ' . $conducteur['nom']) ?></h2>
<?php if (empty($vehicules)): ?>
    <div class="alert info">Vous n'avez aucun véhicule enregistré.</div>
<?php else: ?>
<table class="data">
    <thead><tr><th>Marque</th><th>Modèle</th><th>Année</th><th>Immatriculation</th></tr></thead>
    <tbody>
        <?php foreach ($vehicules as $v): ?>
            <tr>
                <td><?= htmlspecialchars($v['marque']) ?></td>
                <td><?= htmlspecialchars($v['modele']) ?></td>
                <td><?= (int) $v['annee'] ?></td>
                <td><?= htmlspecialchars($v['immatriculation']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>
