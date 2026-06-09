<h2 class="text-danger mb-3">Innovation MVC — Améliorations de l'architecture</h2>

<p>
    Par rapport au MVC « de base » étudié en cours, notre implémentation
    introduit plusieurs améliorations qui renforcent la séparation des
    responsabilités et la maintenabilité.
</p>

<div class="accordion" id="innovMvc">
    <div class="accordion-item">
        <h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#i1">1. Front Controller unique + routeur déclaratif</button></h2>
        <div id="i1" class="accordion-collapse collapse show" data-bs-parent="#innovMvc"><div class="accordion-body">
            Toutes les requêtes passent par <code>index.php</code> qui délègue à un <code>Router</code> doté d'une table de routes déclarative (action → [Contrôleur, méthode]). Ajouter une fonctionnalité = ajouter une ligne.
        </div></div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#i2">2. Modèle de base mutualisé (couche PDO)</button></h2>
        <div id="i2" class="accordion-collapse collapse" data-bs-parent="#innovMvc"><div class="accordion-body">
            La classe abstraite <code>Model</code> centralise la connexion PDO et les helpers. Seule cette couche parle à la base — jamais les vues.
        </div></div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#i3">3. Contrôleur de base avec gardes de rôle</button></h2>
        <div id="i3" class="accordion-collapse collapse" data-bs-parent="#innovMvc"><div class="accordion-body">
            <code>Controller</code> fournit <code>exigerRole()</code>, un point unique de contrôle d'accès, un système de messages flash et un <code>render()</code> qui compose header + fragmentMenu + footer.
        </div></div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#i4">4. Requêtes 100 % préparées + sortie échappée</button></h2>
        <div id="i4" class="accordion-collapse collapse" data-bs-parent="#innovMvc"><div class="accordion-body">
            Toutes les entrées passent par des requêtes préparées (anti-injection SQL) et les sorties sont échappées via <code>htmlspecialchars</code> (anti-XSS).
        </div></div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#i5">5. Vues sans logique métier</button></h2>
        <div id="i5" class="accordion-collapse collapse" data-bs-parent="#innovMvc"><div class="accordion-body">
            Les vues ne reçoivent que des données déjà préparées par le contrôleur ; aucune requête ni calcul métier — code testable et réutilisable.
        </div></div>
    </div>
</div>
