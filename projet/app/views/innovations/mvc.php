<?php /** Innovation MVC : explication des améliorations d'architecture. */ ?>
<h2 class="section-titre">Innovation MVC — Améliorations de l'architecture</h2>

<p>
    Par rapport au MVC « de base » étudié en cours, notre implémentation
    introduit plusieurs améliorations qui renforcent la séparation des
    responsabilités et la maintenabilité.
</p>

<div class="card" style="max-width:none">
    <h3>1. Front Controller unique + routeur déclaratif</h3>
    <p>
        Toutes les requêtes passent par <code>index.php</code> qui délègue à un
        <code>Router</code> doté d'une <strong>table de routes déclarative</strong>
        (action → [Contrôleur, méthode]). Ajouter une fonctionnalité = ajouter
        une ligne, sans toucher à la logique d'aiguillage.
    </p>

    <h3>2. Modèle de base mutualisé (couche d'accès PDO)</h3>
    <p>
        La classe abstraite <code>Model</code> centralise la connexion PDO et les
        helpers (<code>fetchAll</code>, <code>fetchOne</code>, <code>execute</code>,
        <code>nextId</code>). Les modèles concrets ne contiennent que du SQL métier,
        et <strong>seule cette couche parle à la base</strong> — jamais les vues.
    </p>

    <h3>3. Contrôleur de base avec gardes de rôle</h3>
    <p>
        <code>Controller</code> fournit <code>exigerRole()</code>, un point unique
        de contrôle d'accès basé sur la session, ainsi qu'un système de
        <strong>messages flash</strong> et un <code>render()</code> qui compose
        systématiquement header + <code>fragmentMenu</code> + footer.
    </p>

    <h3>4. Requêtes 100 % préparées (sécurité)</h3>
    <p>
        Toutes les entrées passent par des <strong>requêtes préparées</strong>
        (anti-injection SQL) et les sorties sont échappées via
        <code>htmlspecialchars</code> (anti-XSS).
    </p>

    <h3>5. Vues sans logique métier</h3>
    <p>
        Les vues ne reçoivent que des données déjà préparées par le contrôleur ;
        elles ne font aucune requête ni calcul métier, ce qui rend le code
        testable et réutilisable.
    </p>
</div>
