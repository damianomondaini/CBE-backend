<?php $title = 'Dashboard Admin'; ?>

<?php
    $allStudents = $students->fetchAll();
?>

<?php ob_start(); ?>

<section class="dashboard container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Dashboard admin</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h2>Commandes à assigner</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Produit</th>
                        <th scope="col">Valeure</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">État</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($order = $unassignedOrders->fetch())
                    {
                    ?>
                        <tr>
                            <th scope="row"><?= $order['id_order']; ?></th>
                            <td><?= $order['product_name']; ?></td>
                            <td><?php print_r(unserialize(base64_decode($order['value']))); ?></td>
                            <td><?= $order['amount']; ?></td>
                            <td><?= $order['status']; ?></td>
                            <td>
                                <form action="index.php?req=assignOrder&role=2&orderId=<?= $order['id_order']; ?>" method="POST">
                                <select name="studentId" id="studentId">
                                    <?php
                                        for ($i=0; $i < count($allStudents); $i++) { 
                                    ?>
                                        <option value="<?= $allStudents[$i]['id_user'];?>"><?= $allStudents[$i]['name'];?> <?= $allStudents[$i]['surname'];?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                <input type="submit" value="Assign">
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    $unassignedOrders->closeCursor();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('view/include/template.php'); ?>