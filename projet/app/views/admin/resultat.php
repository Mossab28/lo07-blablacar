<?php /** Vue générique de résultat d'une opération (succès / échec). */ ?>
<h2 class="section-titre">Résultat de l'opération</h2>
<div class="alert <?= $succes ? 'ok' : 'ko' ?>">
    <?= htmlspecialchars($message) ?>
</div>
<a class="btn ghost" href="<?= BASE_URL ?>index.php?action=<?= htmlspecialchars($retour) ?>">Continuer</a>
