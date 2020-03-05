<?php $title = 'Produit'; ?>

<?php ob_start(); ?>

<?php
    $dataProduct = $product->fetch();
?>
<?php
    if($dataProduct['id_product'] == '1')
    {
        include './view/shop/forms/visitCard.php';
    }
    elseif($dataProduct['id_product'] == '2')
    {
        include './view/shop/forms/testForm2.php';
    }
?>
<?= $form ?>
<?php
    $product->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('./view/include/template.php'); ?>