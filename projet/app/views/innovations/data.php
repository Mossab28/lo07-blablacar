<h2 class="section-titre">Innovation données — Tableau de bord du covoiturage</h2>
<p>
    Exploitation originale des données déjà présentes en base (sans table
    supplémentaire) pour offrir une vision analytique de l'activité : volume
    d'affaires, conducteurs les plus actifs et lignes les plus demandées.
</p>

<div class="stats-grid">
    <div class="stat-card"><div class="val"><?= (int) $stats['total_trajets'] ?></div><div class="lib">Trajets au total</div></div>
    <div class="stat-card"><div class="val"><?= (int) $stats['trajets_actifs'] ?></div><div class="lib">Trajets actifs</div></div>
    <div class="stat-card"><div class="val"><?= (int) $stats['total_resa'] ?></div><div class="lib">Réservations</div></div>
    <div class="stat-card"><div class="val"><?= number_format((float) $stats['prix_moyen'], 2) ?> €</div><div class="lib">Prix moyen</div></div>
    <div class="stat-card"><div class="val"><?= number_format((float) $stats['volume_affaires'], 2) ?> €</div><div class="lib">Volume d'affaires</div></div>
</div>

<h3>Top 5 des conducteurs les plus actifs</h3>
<table class="data">
    <thead><tr><th>Conducteur</th><th>Trajets proposés</th></tr></thead>
    <tbody>
        <?php foreach ($topConducteurs as $c): ?>
            <tr><td><?= htmlspecialchars($c['conducteur']) ?></td><td><?= (int) $c['nb'] ?></td></tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h3 style="margin-top:1.5rem">Top 5 des lignes les plus réservées</h3>
<table class="data">
    <thead><tr><th>Ligne</th><th>Réservations</th><th>Prix (€)</th></tr></thead>
    <tbody>
        <?php foreach ($topTrajets as $t): ?>
            <tr>
                <td><?= htmlspecialchars($t['ligne']) ?></td>
                <td><?= (int) $t['nb_resa'] ?></td>
                <td><?= number_format((float) $t['prix'], 2) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
