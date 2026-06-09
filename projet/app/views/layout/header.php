<?php
/**
 * En-tête HTML commun à toutes les pages.
 * $titre est fourni par le contrôleur via render().
 */
$titrePage = isset($titre) && $titre !== '' ? $titre . ' - ' : '';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($titrePage) ?>BlaBlaCar 2026</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/style.css">
</head>
<body>
