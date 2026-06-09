<h2 class="section-titre">Sélectionnez l'un de mes trajets actifs</h2>

<?php if (empty($trajetsActifs)): ?>
    <div class="alert info">Vous n'avez aucun trajet actif.</div>
<?php else: ?>
    <form method="get" action="<?= BASE_URL ?>index.php">
        <input type="hidden" name="action" value="cond_passagers">
        <ul class="choix">
            <?php foreach ($trajetsActifs as $t): ?>
                <li>
                    <label>
                        <input type="radio" name="trajet_id" value="<?= (int) $t['id'] ?>"
                            <?= ($trajetChoisi && (int) $trajetChoisi['id'] === (int) $t['id']) ? 'checked' : '' ?>>
                        <?= htmlspecialchars(ucfirst($t['ville_depart']) . ' vers ' . ucfirst($t['ville_arrivee'])
                            . ' le ' . $t['date_depart'] . ' à ' . $t['heure_depart']) ?>
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
        <button type="submit" class="btn">Afficher les passagers</button>
    </form>
<?php endif; ?>

<?php if ($trajetChoisi !== null): ?>
    <h2 class="section-titre" style="margin-top:1.6rem">
        Passagers du trajet <?= htmlspecialchars(ucfirst($trajetChoisi['ville_depart']) . ' → ' . ucfirst($trajetChoisi['ville_arrivee'])) ?>
    </h2>
    <?php if (empty($passagers)): ?>
        <div class="alert info">Aucun passager n'a encore réservé ce trajet.</div>
    <?php else: ?>
    <table class="data">
        <thead><tr><th>Passager</th><th>Login</th><th>Solde (€)</th></tr></thead>
        <tbody>
            <?php foreach ($passagers as $p): ?>
                <tr>
                    <td><?= htmlspecialchars($p['passager']) ?></td>
                    <td><?= htmlspecialchars($p['login']) ?></td>
                    <td><?= number_format((float) $p['solde'], 2, '.', ' ') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
<?php endif; ?>
