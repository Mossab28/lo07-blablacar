<h2 class="text-danger mb-3">10 nouvelles réservations aléatoires</h2>
<?php if (!empty($erreur)): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($erreur) ?></div>
<?php else: ?>
    <ol class="list-group list-group-numbered mb-3">
        <?php foreach ($resultats as $ligne): ?>
            <li class="list-group-item"><?= htmlspecialchars($ligne) ?></li>
        <?php endforeach; ?>
    </ol>
    <a class="btn btn-outline-primary" href="<?= BASE_URL ?>index.php?action=exam_reservations">Recommencer</a>
<?php endif; ?>
