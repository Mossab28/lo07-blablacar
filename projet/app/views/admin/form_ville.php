<?php /** A7 : formulaire d'ajout d'une ville. */ ?>
<div class="card">
    <h2>Formulaire d'ajout d'une nouvelle ville</h2>
    <form method="post" action="<?= BASE_URL ?>index.php?action=admin_ajout_ville">
        <label for="nom">Nom de la ville</label>
        <input type="text" id="nom" name="nom" required>
        <button type="submit" class="btn">Ajouter</button>
    </form>
</div>
