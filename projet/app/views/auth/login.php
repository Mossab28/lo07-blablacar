<div class="card shadow-sm mx-auto" style="max-width:480px;">
    <div class="card-body">
        <h2 class="card-title text-danger mb-3">Connexion</h2>
        <?php if (!empty($flash)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($flash) ?></div>
        <?php endif; ?>
        <form method="post" action="<?= BASE_URL ?>index.php?action=authentifier">
            <div class="mb-3">
                <label for="login" class="form-label">Login</label>
                <input type="text" class="form-control" id="login" name="login" autofocus required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Se connecter</button>
        </form>
    </div>
</div>
