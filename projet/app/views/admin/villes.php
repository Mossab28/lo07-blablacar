<h2 class="text-danger mb-3">Liste des villes</h2>
<?php if (!empty($flash)): ?><div class="alert alert-info"><?= htmlspecialchars($flash) ?></div><?php endif; ?>
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered align-middle bg-white" style="max-width:420px;">
    <thead class="table-dark"><tr><th>Ville</th></tr></thead>
    <tbody>
        <?php foreach ($villes as $v): ?>
            <tr><td><?= htmlspecialchars(ucfirst($v['nom'])) ?></td></tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
