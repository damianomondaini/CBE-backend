<?php $title = 'Produit'; ?>

<?php ob_start(); ?>

<?php
    $dataProduct = $product->fetch();
?>
    <section class="cardProduct container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header"><?= $dataProduct['name']; ?></div>
                    <img src="src/public/img/carte-visite.jpg" class="card-img-top" alt="Carte de visite">
                    <div class="card-body">
                        <h2>Description</h2>
                        <p class="card-text">Votre splendide carte de visite pour les visites de stage par exemple !</p>
                        <h2>Personnalisation</h2>
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
                    </div>
                </div>
            </div>
    </section>
<?php
    $product->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('./view/include/template.php'); ?>