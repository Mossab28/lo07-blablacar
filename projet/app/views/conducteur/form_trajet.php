<div class="card">
    <h2>Création d'un nouveau trajet</h2>
    <?php if (empty($vehicules)): ?>
        <div class="alert ko">
            Vous devez d'abord posséder un véhicule pour créer un trajet.
        </div>
    <?php else: ?>
    <form method="post" action="<?= BASE_URL ?>index.php?action=cond_ajout_trajet">
        <label for="ville_depart">Ville de départ</label>
        <select id="ville_depart" name="ville_depart" required>
            <?php foreach ($villes as $v): ?>
                <option value="<?= (int) $v['id'] ?>"><?= htmlspecialchars(ucfirst($v['nom'])) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="ville_arrivee">Ville d'arrivée</label>
        <select id="ville_arrivee" name="ville_arrivee" required>
            <?php foreach ($villes as $v): ?>
                <option value="<?= (int) $v['id'] ?>"><?= htmlspecialchars(ucfirst($v['nom'])) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="vehicule_id">Sélection d'un véhicule</label>
        <select id="vehicule_id" name="vehicule_id" required>
            <?php foreach ($vehicules as $v): ?>
                <option value="<?= (int) $v['id'] ?>">
                    <?= htmlspecialchars($v['marque'] . ' ' . $v['modele'] . ' (' . $v['immatriculation'] . ')') ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="prix">Prix du trajet (€)</label>
        <input type="number" id="prix" name="prix" step="0.01" min="0" value="10" required>

        <label for="date_depart">Date du trajet</label>
        <input type="date" id="date_depart" name="date_depart" required>

        <label for="heure_depart">Heure du trajet</label>
        <input type="time" id="heure_depart" name="heure_depart" required>

        <button type="submit" class="btn">Submit</button>
        <button type="reset" class="btn reset">Reset</button>
    </form>
    <?php endif; ?>
</div>
