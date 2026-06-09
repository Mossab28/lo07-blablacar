<?php /** P2 : réservation d'un trajet actif. */ ?>
<h2 class="section-titre">Sélectionnez un trajet actif</h2>
<?php if (empty($trajetsActifs)): ?>
    <div class="alert info">Aucun trajet actif n'est disponible à la réservation pour le moment.</div>
<?php else: ?>
    <form method="post" action="<?= BASE_URL ?>index.php?action=pass_reserver">
        <ul class="choix">
            <?php foreach ($trajetsActifs as $t): ?>
                <li>
                    <label>
                        <input type="radio" name="trajet_id" value="<?= (int) $t['id'] ?>" required>
                        <?= htmlspecialchars(ucfirst($t['ville_depart']) . ' --> ' . ucfirst($t['ville_arrivee'])
                            . ' le ' . $t['date_depart'] . ' à ' . $t['heure_depart']
                            . ' — ' . number_format((float) $t['prix'], 2) . ' € (' . $t['conducteur'] . ')') ?>
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
        <button type="submit" class="btn">Submit form</button>
    </form>
<?php endif; ?>
