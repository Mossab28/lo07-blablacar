<div class="card shadow-sm mx-auto" style="max-width:480px;">
    <div class="card-body">
        <h2 class="card-title text-danger mb-3">Formulaire d'ajout d'une nouvelle ville</h2>
        <form method="post" action="<?= BASE_URL ?>index.php?action=admin_ajout_ville">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom de la ville</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</div>
