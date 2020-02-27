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
                    <li class="tab col s6"><a href="#tabstaches">Tâches</a></li>
                    <li class="tab col s6"><a href="#tabscommandes">Mes commandes</a></li>
                </ul>
            </div>
            <div id="tabscommandes" class="col s12">


                <!--1 article -->
                <ul class="collapsible">
                    <li>
                        <div class="collapsible-header">
                            <div class="row container valign-wrapper">
                                <div class="col s7">
                                    <p><strong>Nom</strong><br>Nom du produit</p>
                                </div>
                                <div class="col s1color btn-floating pulse color-point-livraison right-align"></div>
                                <div class="col s2">
                                    <p>Livraison</p>
                                </div>
                                <div class="col s2 right-align">
                                    <p><i class="material-icons">arrow_drop_down</i></p>
                                </div>
                            </div>
                        </div>

                        <div class="collapsible-body">
                            <div class="row">
                                <div class="col s7">
                                    <p><strong>Description</strong><br>Grammage : 200g<br>Format : 85 x 55 mm</p>
                                </div>
                                <div class="col s5">
                                    <p><strong>Envoye le</strong><br>Lu, 12.12.19</p>
                                </div>
                            </div>
                            <div class="right-align legend"><input type="submit" value="Annuler la commande"
                                    name="delete commande" class="red-link"
                                    onclick="M.toast({html: 'Commande Annulé !'})">
                            </div>
                        </div>
                    </li>

                    <!--2 article -->
                    <li>
                        <div class="collapsible-header">
                            <div class="row container valign-wrapper">
                                <div class="col s7">
                                    <p><strong>Nom</strong><br>Nom du produit</p>
                                </div>
                                <div class="col s1color btn-floating pulse color-point-verifie right-align"></div>
                                <div class="col s2">
                                    <p>Verifié</p>
                                </div>
                                <div class="col s2 right-align">
                                    <p><i class="material-icons">arrow_drop_down</i></p>
                                </div>
                            </div>
                        </div>

                        <div class="collapsible-body">
                            <div class="row">
                                <div class="col s7">
                                    <p><strong>Description</strong><br>Grammage : 200g<br>Format : 85 x 55 mm</p>
                                </div>
                                <div class="col s5">
                                    <p><strong>Envoye le</strong><br>Lu, 12.12.19</p>
                                </div>
                            </div>
                            <div class="right-align legend"><input type="submit" value="Annuler la commande"
                                    name="delete commande" class="red-link"
                                    onclick="M.toast({html: 'Commande Annulé !'})">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>


            <!-- version tâches -->
            <div id="tabstaches" class="col s12">
                <ul class="collapsible">

                    <!-- Modal Structure -->
                    <div id="modal1" class="modal bottom-sheet">
                        <div class="modal-content">
                            <h3>Liste des éléves</h3>
                            <div class="collection">
                                <form action="#">
                                    <label>
                                        <p><input name="eleve" type="radio" /><span>Hiove Novartis</span></p>
                                    </label>
                                    <label>
                                        <p><input name="eleve" type="radio" /><span>Hiove Novartis</span></p>
                                    </label>
                                    <label>
                                        <p><input name="eleve" type="radio" /><span>Hiove Novartis</span></p>
                                    </label>
                                    <label>
                                        <p><input name="eleve" type="radio" /><span>Hiove Novartis</span></p>
                                    </label>
                                    <label>
                                        <p><input name="eleve" type="radio" /><span>Hiove Novartis</span></p>
                                    </label>
                                </form>
                            </div>
                        </div>
                        <div class="center-align margin-bottom btn"><input type="submit" name="add eleve"
                                value="Ajouter l'éléve" onclick="M.toast({html: 'Eléve ajouté !'})"></div>
                    </div>

                    <li>
                        <div class="collapsible-header">
                            <div class="row container valign-wrapper">
                                <div class="col s7">
                                    <p><strong>Nom</strong><br>Nom du produit</p>
                                </div>
                                <div class="col s1color btn-floating pulse color-point-besoin right-align"></div>
                                <div class="col s2">
                                    <p>Besoin</p>
                                </div>
                                <div class="col s2 right-align">
                                    <p><i class="material-icons">arrow_drop_down</i></p>
                                </div>
                            </div>
                        </div>

                        <div class="collapsible-body">
                            <div class="row">
                                <div class="col s7">
                                    <p><strong>Description</strong><br>Grammage : 200g<br>Format : 85 x 55 mm</p>
                                </div>
                                <div class="col s5">
                                    <p><strong>Envoye le</strong><br>Lu, 12.12.19</p>
                                </div>
                            </div>
                            <div class="right-align legend"><a href="#modal1" class="modal-trigger">Ajouter un élève</a>
                            </div>
                        </div>
                    </li>

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