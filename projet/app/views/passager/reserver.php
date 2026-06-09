<h2 class="text-danger mb-3">Sélectionnez un trajet actif</h2>
<?php if (empty($trajetsActifs)): ?>
    <div class="alert alert-info">Aucun trajet actif n'est disponible à la réservation pour le moment.</div>
<?php else: ?>
    <form method="post" action="<?= BASE_URL ?>index.php?action=pass_reserver">
        <?php foreach ($trajetsActifs as $t): ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="trajet_id" id="r<?= (int) $t['id'] ?>" value="<?= (int) $t['id'] ?>" required>
                <label class="form-check-label" for="r<?= (int) $t['id'] ?>">
                    <?= htmlspecialchars(ucfirst($t['ville_depart']) . ' --> ' . ucfirst($t['ville_arrivee'])
                        . ' le ' . $t['date_depart'] . ' à ' . $t['heure_depart']
                        . ' — ' . number_format((float) $t['prix'], 2) . ' € (' . $t['conducteur'] . ')') ?>
                </label>
            </div>
        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary mt-2">Submit form</button>
    </form>
<?php endif; ?>
