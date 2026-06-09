<h2 class="text-danger mb-3">Liste de tous les trajets du conducteur <?= htmlspecialchars($conducteur['prenom'] . ' ' . $conducteur['nom']) ?></h2>
<?php if (!empty($flash)): ?><div class="alert alert-success"><?= htmlspecialchars($flash) ?></div><?php endif; ?>
<?php if (empty($trajets)): ?>
    <div class="alert alert-info">Vous n'avez encore proposé aucun trajet.</div>
<?php else: ?>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered align-middle bg-white">
    <thead class="table-dark">
        <tr><th>Départ</th><th>Arrivée</th><th>Date</th><th>Heure</th><th>Prix (€)</th><th>Véhicule</th><th>Statut</th></tr>
    </thead>
    <tbody>
        <?php foreach ($trajets as $t): ?>
            <tr>
                <td><?= htmlspecialchars(ucfirst($t['ville_depart'])) ?></td>
                <td><?= htmlspecialchars(ucfirst($t['ville_arrivee'])) ?></td>
                <td><?= htmlspecialchars($t['date_depart']) ?></td>
                <td><?= htmlspecialchars($t['heure_depart']) ?></td>
                <td><?= number_format((float) $t['prix'], 2, '.', ' ') ?></td>
                <td><?= htmlspecialchars($t['marque'] . ' ' . $t['modele']) ?></td>
                <td><span class="badge <?= $t['statut'] === 'actif' ? 'bg-success' : 'bg-secondary' ?>"><?= htmlspecialchars($t['statut']) ?></span></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
<?php endif; ?>
