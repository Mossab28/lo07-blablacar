<?php /** F1 : formulaire de connexion. */ ?>
<div class="card">
    <h2>Connexion</h2>
    <?php if (!empty($flash)): ?>
        <div class="alert ko"><?= htmlspecialchars($flash) ?></div>
    <?php endif; ?>
    <form method="post" action="<?= BASE_URL ?>index.php?action=authentifier">
        <label for="login">Login</label>
        <input type="text" id="login" name="login" autofocus required>

        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" class="btn">Se connecter</button>
    </form>
</div>
