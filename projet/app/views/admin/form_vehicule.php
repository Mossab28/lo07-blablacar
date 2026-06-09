<?php /** A5 : formulaire d'ajout d'un véhicule. */ ?>
<div class="card">
    <h2>Formulaire de création d'un nouveau véhicule</h2>
    <form method="post" action="<?= BASE_URL ?>index.php?action=admin_ajout_vehicule">
        <label for="marque">Marque</label>
        <input type="text" id="marque" name="marque" required>

        <label for="modele">Modèle</label>
        <input type="text" id="modele" name="modele" required>

        <label for="annee">Année</label>
        <input type="number" id="annee" name="annee" min="1950" max="2030" required>

        <label for="immatriculation">Immatriculation</label>
        <input type="text" id="immatriculation" name="immatriculation" placeholder="ab-123-cd" required>

        <label for="proprietaire_id">Sélectionner un propriétaire (conducteur)</label>
        <select id="proprietaire_id" name="proprietaire_id" required>
            <?php foreach ($conducteurs as $c): ?>
                <option value="<?= (int) $c['id'] ?>">
                    <?= htmlspecialchars($c['prenom'] . ' ' . $c['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit" class="btn">Ajouter</button>
    </form>
</div>
