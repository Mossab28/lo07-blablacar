<div class="card">
  <div class="card-body bg-info">
    <h5 class="card-title">Innovation MVC — Améliorations de l'architecture</h5>
    <div class="mx-lg-3 mt-3 bg-light p-3 rounded">
      <p>
        Par rapport au MVC « de base » étudié en cours, notre implémentation
        introduit plusieurs améliorations qui renforcent la séparation des
        responsabilités et la maintenabilité.
      </p>
      <ol class="mb-0">
        <li><strong>Front Controller unique + routeur déclaratif</strong> : toutes les requêtes passent par <code>index.php</code> qui délègue à un routeur doté d'une table de routes (action → contrôleur). Ajouter une fonctionnalité = ajouter une ligne.</li>
        <li><strong>Modèle de base mutualisé</strong> : une classe abstraite <code>Model</code> centralise la connexion PDO et les helpers. Seule cette couche parle à la base.</li>
        <li><strong>Contrôleur de base avec gardes de rôle</strong> : <code>exigerRole()</code> centralise le contrôle d'accès, plus un système de messages flash.</li>
        <li><strong>Requêtes 100 % préparées</strong> (anti-injection SQL) et sorties échappées via <code>htmlspecialchars</code> (anti-XSS).</li>
        <li><strong>Vues sans logique métier</strong> : elles ne reçoivent que des données déjà préparées par le contrôleur.</li>
      </ol>
    </div>
  </div>
</div>
