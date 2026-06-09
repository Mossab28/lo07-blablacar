<h2 class="text-danger mb-3">Clôturer l'un de mes trajets actifs</h2>
<?php if (!empty($flash)): ?><div class="alert alert-info"><?= htmlspecialchars($flash) ?></div><?php endif; ?>

<div class="alert alert-info">
    La clôture passe le trajet en statut <strong>passif</strong>, empêche de
    nouvelles réservations et déclenche les paiements : chaque passager ayant
    réservé est débité du prix du trajet, et votre compte est crédité d'autant.
</div>

<?php if (empty($trajetsActifs)): ?>
    <div class="alert alert-info">Vous n'avez aucun trajet actif à clôturer.</div>
<?php else: ?>
    <form method="post" action="<?= BASE_URL ?>index.php?action=cond_cloturer">
        <?php foreach ($trajetsActifs as $t): ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="trajet_id" id="c<?= (int) $t['id'] ?>" value="<?= (int) $t['id'] ?>" required>
                <label class="form-check-label" for="c<?= (int) $t['id'] ?>">
                    <?= htmlspecialchars(ucfirst($t['ville_depart']) . ' vers ' . ucfirst($t['ville_arrivee'])
                        . ' le ' . $t['date_depart'] . ' à ' . $t['heure_depart']
                        . ' (' . number_format((float) $t['prix'], 2) . ' €)') ?>
                </label>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-danger mt-2">Clôturer ce trajet</button>
    </form>
<?php endif; ?>
