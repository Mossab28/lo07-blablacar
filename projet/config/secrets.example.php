<?php
/**
 * MODÈLE d'identifiants pour dev-isi.utt.fr.
 *
 * Copie ce fichier en « secrets.php » (même dossier) et remplis tes vraies
 * valeurs. secrets.php est ignoré par git : il ne sera JAMAIS publié.
 *
 *   - name : nom de TA base MySQL sur dev-isi (visible dans phpMyAdmin)
 *   - user : ton login LDAP UTT
 *   - pass : ton mot de passe MySQL (fichier connexion_base.txt récupéré
 *            via FileZilla — généralement différent du mot de passe LDAP)
 */
return [
    'name' => 'ton_nom_de_base',
    'user' => 'ton_login_ldap',
    'pass' => 'ton_mot_de_passe_mysql',
];
