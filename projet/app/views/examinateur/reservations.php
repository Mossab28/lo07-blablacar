<h2 class="section-titre">10 nouvelles réservations aléatoires</h2>
<?php if (!empty($erreur)): ?>
    <div class="alert ko"><?= htmlspecialchars($erreur) ?></div>
<?php else: ?>
    <ol>
        <?php foreach ($resultats as $ligne): ?>
            <li><?= htmlspecialchars($ligne) ?></li>
        <?php endforeach; ?>
    </ol>
    <a class="btn ghost" href="<?= BASE_URL ?>index.php?action=exam_reservations">Recommencer</a>
<?php endif; ?>
