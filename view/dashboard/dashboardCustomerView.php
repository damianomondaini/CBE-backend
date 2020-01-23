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