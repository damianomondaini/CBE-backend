<?php $title = 'Carte de visite'; ?>

<?php ob_start(); ?>

<p>
    <p><?= $firstName ?></p>
    <p><?= $lastName ?></p>
    <p><?= $title ?></p>
    <p><?= $amount ?></p>
    <p><?= $design ?></p>
    <p><?= $appointment ?></p>
</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>