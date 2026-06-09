<h2 class="text-danger mb-3">Liste des véhicules du conducteur <?= htmlspecialchars($conducteur['prenom'] . ' ' . $conducteur['nom']) ?></h2>
<?php if (empty($vehicules)): ?>
    <div class="alert alert-info">Vous n'avez aucun véhicule enregistré.</div>
<?php else: ?>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered align-middle bg-white">
    <thead class="table-dark"><tr><th>Marque</th><th>Modèle</th><th>Année</th><th>Immatriculation</th></tr></thead>
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
</div>
<?php endif; ?>
