<h2 class="section-titre">Liste de mes réservations</h2>
<?php if (!empty($flash)): ?><div class="alert ok"><?= htmlspecialchars($flash) ?></div><?php endif; ?>
<?php if (empty($reservations)): ?>
    <div class="alert info">Vous n'avez aucune réservation.</div>
<?php else: ?>
<table class="data">
    <thead>
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
                <td><span class="badge <?= $r['statut'] ?>"><?= htmlspecialchars($r['statut']) ?></span></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>
