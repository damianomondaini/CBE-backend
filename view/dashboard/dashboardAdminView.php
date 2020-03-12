<?php
    $title = 'Tableau de bord client';
    $allStudents = $students->fetchAll();

    ob_start();
?>

<section class="dashboard-section">
    <!--User-->
    <article id="user">
        <div class="row valign-wrapper">
        <div class="col s6 center"><img class="circle z-depth-1" src="src\public\img\default-user-icon.jpg" width="60%"></div>
            <div class="col s6 left-align">
            <h3><?= $_SESSION['surname']; ?> <?= $_SESSION['name']; ?></h3>
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
                </ul>
            </div>
            <div id="tabscommandes" class="col s12">


            <!-- version tâches -->
            <div id="tabstaches" class="col s12">
                <ul class="collapsible">

                    <?php
                    while ($order = $unassignedOrders->fetch())
                    {
                    ?>
                        <li>
                            <div class="collapsible-header">
                                <div class="row container valign-wrapper">
                                    <div class="col s7">
                                        <p><strong>#<?= $order['id_order']; ?></strong><br><?= $order['product_name']; ?></p>
                                    </div>
                                    <div class="col s1color btn-floating pulse color-point-besoin right-align"></div>
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
                                        <p><?php print_r(unserialize(base64_decode($order['value']))); ?></p>
                                        <p>Qté: <?= $order['amount']; ?></p>
                                    </div>
                                    <div class="col s5">
                                        <p><strong>Commandé le</strong><br><?= $order['date']; ?></p>
                                    </div>
                                    <form action="index.php?req=assignOrder&orderId=<?= $order['id_order']; ?>" method="POST">
                                        <select name="studentId" id="studentId">
                                            <?php
                                                for ($i=0; $i < count($allStudents); $i++) { 
                                            ?>
                                                <option value="<?= $allStudents[$i]['id_user'];?>"><?= $allStudents[$i]['name'];?> <?= $allStudents[$i]['surname'];?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                        <input type="submit" class="btn add-student-button" value="Ajouter l'éléve" onclick="M.toast({html: 'Eléve ajouté !'})">
                                    </form>
                                </div>
                            </div>
                        </li>
                    <?php
                    }
                    $unassignedOrders->closeCursor();
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