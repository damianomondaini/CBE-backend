<?php $title = 'Dashboard élève'; ?>

<?php ob_start(); ?>

<section class="dashboard container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Dashboard élève</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2>Mes commandes à traiter</h2>
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
                        <th scope="col">Enseignant</th>
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
                            <td><?php echo $order['customer_name'] . ' ' . $order['customer_surname']; ?></td>
                            <td>
                                <?php
                                    if ($order['idx_status'] == 2)
                                    {
                                ?>
                                    <a href="index.php?req=acceptOrder&role=1&orderId=<?= $order['id_order']; ?>">Accepter</a>
                                    <a href="index.php?req=declineOrder&role=1&orderId=<?= $order['id_order']; ?>">Rejeter</a>
                                <?php
                                    }
                                    elseif ($order['idx_status'] == 3)
                                    {
                                ?>
                                    <a href="index.php?req=validateOrder&role=1&orderId=<?= $order['id_order']; ?>">Valider</a>
                                    <a href="index.php?req=cancelOrder&role=1&orderId=<?= $order['id_order']; ?>">Annuler</a>
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