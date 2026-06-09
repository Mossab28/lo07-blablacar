<h2 class="text-danger mb-3">Innovation données — Tableau de bord du covoiturage</h2>
<p>
    Exploitation originale des données déjà présentes en base (sans table
    supplémentaire) pour offrir une vision analytique de l'activité : volume
    d'affaires, conducteurs les plus actifs et lignes les plus demandées.
</p>

<div class="row g-3 my-2">
    <div class="col"><div class="card text-center shadow-sm"><div class="card-body"><div class="h3 text-primary mb-0"><?= (int) $stats['total_trajets'] ?></div><small class="text-muted">Trajets au total</small></div></div></div>
    <div class="col"><div class="card text-center shadow-sm"><div class="card-body"><div class="h3 text-primary mb-0"><?= (int) $stats['trajets_actifs'] ?></div><small class="text-muted">Trajets actifs</small></div></div></div>
    <div class="col"><div class="card text-center shadow-sm"><div class="card-body"><div class="h3 text-primary mb-0"><?= (int) $stats['total_resa'] ?></div><small class="text-muted">Réservations</small></div></div></div>
    <div class="col"><div class="card text-center shadow-sm"><div class="card-body"><div class="h3 text-primary mb-0"><?= number_format((float) $stats['prix_moyen'], 2) ?> €</div><small class="text-muted">Prix moyen</small></div></div></div>
    <div class="col"><div class="card text-center shadow-sm"><div class="card-body"><div class="h3 text-primary mb-0"><?= number_format((float) $stats['volume_affaires'], 2) ?> €</div><small class="text-muted">Volume d'affaires</small></div></div></div>
</div>

<h4 class="mt-4">Top 5 des conducteurs les plus actifs</h4>
<div class="table-responsive">
<table class="table table-striped table-bordered align-middle bg-white">
    <thead class="table-dark"><tr><th>Conducteur</th><th>Trajets proposés</th></tr></thead>
    <tbody>
        <?php foreach ($topConducteurs as $c): ?>
            <tr><td><?= htmlspecialchars($c['conducteur']) ?></td><td><?= (int) $c['nb'] ?></td></tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>

<h4 class="mt-4">Top 5 des lignes les plus réservées</h4>
<div class="table-responsive">
<table class="table table-striped table-bordered align-middle bg-white">
    <thead class="table-dark"><tr><th>Ligne</th><th>Réservations</th><th>Prix (€)</th></tr></thead>
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
</div>
