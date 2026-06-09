<?php /** C2 : tous les trajets (actifs + passifs) du conducteur. */ ?>
<h2 class="section-titre">Liste de tous les trajets du conducteur <?= htmlspecialchars($conducteur['prenom'] . ' ' . $conducteur['nom']) ?></h2>
<?php if (!empty($flash)): ?><div class="alert ok"><?= htmlspecialchars($flash) ?></div><?php endif; ?>
<?php if (empty($trajets)): ?>
    <div class="alert info">Vous n'avez encore proposé aucun trajet.</div>
<?php else: ?>
<table class="data">
    <thead>
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
                <td><span class="badge <?= $t['statut'] ?>"><?= htmlspecialchars($t['statut']) ?></span></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>
