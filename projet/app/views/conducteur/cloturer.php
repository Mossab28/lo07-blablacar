<?php /** C5 : clôturer un trajet actif. */ ?>
<h2 class="section-titre">Clôturer l'un de mes trajets actifs</h2>
<?php if (!empty($flash)): ?><div class="alert info"><?= htmlspecialchars($flash) ?></div><?php endif; ?>

<p class="alert info">
    La clôture passe le trajet en statut <strong>passif</strong>, empêche de
    nouvelles réservations et déclenche les paiements : chaque passager ayant
    réservé est débité du prix du trajet, et votre compte est crédité d'autant.
</p>

<?php if (empty($trajetsActifs)): ?>
    <div class="alert info">Vous n'avez aucun trajet actif à clôturer.</div>
<?php else: ?>
    <form method="post" action="<?= BASE_URL ?>index.php?action=cond_cloturer">
        <ul class="choix">
            <?php foreach ($trajetsActifs as $t): ?>
                <li>
                    <label>
                        <input type="radio" name="trajet_id" value="<?= (int) $t['id'] ?>" required>
                        <?= htmlspecialchars(ucfirst($t['ville_depart']) . ' vers ' . ucfirst($t['ville_arrivee'])
                            . ' le ' . $t['date_depart'] . ' à ' . $t['heure_depart']
                            . ' (' . number_format((float) $t['prix'], 2) . ' €)') ?>
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
        <button type="submit" class="btn">Clôturer ce trajet</button>
    </form>
<?php endif; ?>
