<div class="card shadow-sm mx-auto" style="max-width:560px;">
    <div class="card-body">
        <h2 class="card-title text-danger mb-3">Création d'un nouveau trajet</h2>
        <?php if (empty($vehicules)): ?>
            <div class="alert alert-danger">Vous devez d'abord posséder un véhicule pour créer un trajet.</div>
        <?php else: ?>
        <form method="post" action="<?= BASE_URL ?>index.php?action=cond_ajout_trajet">
            <div class="mb-3">
                <label for="ville_depart" class="form-label">Ville de départ</label>
                <select class="form-select" id="ville_depart" name="ville_depart" required>
                    <?php foreach ($villes as $v): ?>
                        <option value="<?= (int) $v['id'] ?>"><?= htmlspecialchars(ucfirst($v['nom'])) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="ville_arrivee" class="form-label">Ville d'arrivée</label>
                <select class="form-select" id="ville_arrivee" name="ville_arrivee" required>
                    <?php foreach ($villes as $v): ?>
                        <option value="<?= (int) $v['id'] ?>"><?= htmlspecialchars(ucfirst($v['nom'])) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="vehicule_id" class="form-label">Sélection d'un véhicule</label>
                <select class="form-select" id="vehicule_id" name="vehicule_id" required>
                    <?php foreach ($vehicules as $v): ?>
                        <option value="<?= (int) $v['id'] ?>"><?= htmlspecialchars($v['marque'] . ' ' . $v['modele'] . ' (' . $v['immatriculation'] . ')') ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="prix" class="form-label">Prix du trajet (€)</label>
                <input type="number" class="form-control" id="prix" name="prix" step="0.01" min="0" value="10" required>
            </div>
            <div class="mb-3">
                <label for="date_depart" class="form-label">Date du trajet</label>
                <input type="date" class="form-control" id="date_depart" name="date_depart" required>
            </div>
            <div class="mb-3">
                <label for="heure_depart" class="form-label">Heure du trajet</label>
                <input type="time" class="form-control" id="heure_depart" name="heure_depart" required>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </form>
        <?php endif; ?>
    </div>
</div>
