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
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Titre</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">RDV</th>
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
                            <th scope="row"><?= $order['id_carte_visite']; ?></th>
                            <td><?= $order['nom']; ?></td>
                            <td><?= $order['prenom']; ?></td>
                            <td><?= $order['titre']; ?></td>
                            <td><?= $order['nombre']; ?></td>
                            <td>
                            <?php
                                if($order['rdv'] == 1)
                                {
                                    echo 'Non';
                                } else {
                                    echo 'Oui';
                                }
                            ?>
                            </td>
                            <td>
                            <?php
                                if($order['etat'] == 0)
                                {
                                    echo 'Pas validée';
                                } elseif ($order['etat'] == 1)
                                {
                                    echo 'En cours';
                                } elseif ($order['etat'] == 2)
                                {
                                    echo 'Terminée';
                                } elseif ($order['etat'] == 3)
                                {
                                    echo 'Annulée';
                                }
                            ?>
                            </td>
                            <td><?= $order['prenom_enseignant'] . ' ' . $order['nom_enseignant']; ?></td>
                            <td>
                                <a href="index.php?action=validateOrder&role=0&orderId=<?= $order['id_carte_visite']; ?>">✔</a>
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

<?php require('template.php'); ?>