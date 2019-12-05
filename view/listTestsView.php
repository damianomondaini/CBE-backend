<?php $title = 'Test'; ?>

<?php ob_start(); ?>

    <?php
    while ($row = $tests->fetch())
    {
    ?>
        <div class="tests">
            <p><?= $row['id']; ?></p>
            <p><?= $row['nom']; ?></p>
        </div>
    <?php
    }
    $tests->closeCursor();
    ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>