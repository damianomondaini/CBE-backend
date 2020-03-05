<?php /*
<?php $title = 'Dashboard Customer'; ?>

<?php ob_start(); ?>

<section class="dashboard container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Dashboard customer</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2>Mes commandes</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Produit</th>
                        <th scope="col">Valeures</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">État</th>
                        <th scope="col">Élève assigné</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($order = $orders->fetch())
                    {
                    ?>
                    <tr>
                        <th scope="row"><?= $order['id_order']; ?></th>
                        <td><?= $order['product_name']; ?></td>
                        <td><?php print_r(unserialize(base64_decode($order['value']))); ?></td>
                        <td><?= $order['amount']; ?></td>
                        <td><?= $order['status']; ?></td>
                        <td>
                            <?php
                                    if($order['student_name'] != null)
                                    {
                                        echo $order['student_name'] . ' ' . $order['student_surname'];
                                    }
                                    else
                                    {
                                        echo 'Aucun';
                                    }
                                ?>
                        </td>
                        <td>
                            <?php
                                    if($order['idx_status'] == 1 || $order['idx_status'] == 2 || $order['idx_status'] == 3)
                                    {
                                ?>
                            <a href="index.php?req=cancelOrder&role=2&orderId=<?= $order['id_order']; ?>">Annuler</a>
                            <?php
                                    }
                                ?>
                        </td>
                    </tr>
                    <?php
                    }
                    $orders->closeCursor();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/include/template.php'); ?>
*/ ?>

<?php
    $title = 'Tableau de bord client';
    ob_start();
?>

<section class="dashboard-section">
    <!--User-->
    <article id="user">
        <div class="row valign-wrapper">
            <div class="col s6 center"><img class="circle z-depth-1" src="src/public/img/temp/Moritz_Tannast.jpg"
                    alt="jacobi" width="60%"></div>
            <div class="col s6 left-align">
                <h3>Alain Jacobi</h3>
                <h4>Administrateur</h4>
            </div>
        </div>
    </article>

    <!--Table-->
    <article id="commandes">
        <div class="row">
            <div class="col s12">
                <ul class="tabs">
                    <li class="tab col s12"><a href="#tabscommandes">Mes commandes</a></li>
                </ul>
            </div>
            <div id="tabscommandes" class="col s12">


                <!--1 article -->
            <ul class="collapsible">
                <?php
                while ($order = $orders->fetch())
                {
                ?>
                    <li>
                        <div class="collapsible-header">
                            <div class="row container valign-wrapper">
                                <div class="col s7">
                                    <p>
                                        <strong> 
                                            <?php 
                                                if ($order['student_name'] === NULL) 
                                                {
                                                    
                                                }
                                                else
                                                {
                                                    echo 'Élève assigné:' . ' ' . $order['student_name'] . ' ' . $order['student_surname']; 
                                                }
                                                
                                            ?>
                                        </strong><br>
                                            Produit: <?= $order['product_name']; ?>
                                    </p>
                                </div>
                                <div class="col s1color btn-floating pulse color-point-livraison right-align"></div>
                                <div class="col s2">
                                    <p><?= $order['status']; ?></p>
                                </div>
                                <div class="col s2 right-align">
                                    <p><i class="material-icons">arrow_drop_down</i></p>
                                </div>
                            </div>
                        </div>

                        <div class="collapsible-body">
                            <div class="row">
                                <div class="col s7">
                                    <p><strong>Description</strong><br>
                                    Numéo de la commande : <?= $order['id_order']; ?><br>
                                    Nombre de commande : <?= $order['amount']; ?></p>
                                </div>
                                <div class="col s5">
                                    <p><strong>Envoyé le</strong><br>
                                    <?= $order['date']; ?></p>
                                </div>
                            </div>
                            <div class="right-align legend">
                                <?php
                                    if ($order['idx_status'] != 5)
                                    {
                                ?>
                                <a href="index.php?req=cancelOrder&role=1&orderId=<?= $order['id_order'];?>" class="red-link" onclick="M.toast({html: 'Commande Annulé !'})">Annuler</a>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>
                    </li>
                <?php
                }
                $orders->closeCursor();
                ?>
            </ul>
            </div>
        </div>
    </article>
</section>

<!--JavaScript at end of body for optimized loading-->
<script>
    M.AutoInit();
</script>

<?php
    $content = ob_get_clean();
    require('view/include/template.php');
?>