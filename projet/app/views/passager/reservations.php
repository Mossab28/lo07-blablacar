<h2 class="text-danger mb-3">Liste de mes réservations</h2>
<?php if (!empty($flash)): ?><div class="alert alert-success"><?= htmlspecialchars($flash) ?></div><?php endif; ?>
<?php if (empty($reservations)): ?>
    <div class="alert alert-info">Vous n'avez aucune réservation.</div>
<?php else: ?>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered align-middle bg-white">
    <thead class="table-dark">
        <tr><th>Date</th><th>Heure</th><th>Départ</th><th>Destination</th>
            <th>Conducteur</th><th>Véhicule</th><th>Immatriculation</th>
            <th>Prix (€)</th><th>Statut</th></tr>
    </thead>
    <tbody>
        <?php foreach ($reservations as $r): ?>
            <tr>
                <td><?= htmlspecialchars($r['date_depart']) ?></td>
                <td><?= htmlspecialchars($r['heure_depart']) ?></td>
                <td><?= htmlspecialchars(ucfirst($r['depart'])) ?></td>
                <td><?= htmlspecialchars(ucfirst($r['arrivee'])) ?></td>
                <td><?= htmlspecialchars($r['conducteur']) ?></td>
                <td><?= htmlspecialchars($r['vehicule']) ?></td>
                <td><?= htmlspecialchars($r['immatriculation']) ?></td>
                <td><?= number_format((float) $r['prix'], 2, '.', ' ') ?></td>
                <td><span class="badge <?= $r['statut'] === 'actif' ? 'bg-success' : 'bg-secondary' ?>"><?= htmlspecialchars($r['statut']) ?></span></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
<?php endif; ?>
