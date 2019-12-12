<?php $title = 'Shop PAO'; ?>

<?php ob_start(); ?>

<section class="shop container">
    <div class="row">
        <div class="col-sm-4 productColumn">
            <div class="card product">
                <a href="index.php?action=cardProduct&role=1"><img src="src/public/img/carte-visite.jpg" class="card-img-top" alt="Carte de visite"></a>
                <div class="card-body">
                <a href="index.php?action=cardProduct&role=1"><h5 class="card-title">Carte de visite</h5></a>
                    <p class="card-text">Votre splendide carte de visite pour les visites de stage par exemple !</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4 productColumn">
            <div class="card product">
                <a href="#"><img src="src/public/img/grey.png" class="card-img-top" alt="A venir"></a>
                <div class="card-body">
                <a href="#"><h5 class="card-title">A venir</h5></a>
                    <p class="card-text">Nouveaux produits à venir</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4 productColumn">
            <div class="card product">
                <a href="#"><img src="src/public/img/grey.png" class="card-img-top" alt="A venir"></a>
                <div class="card-body">
                <a href="#"><h5 class="card-title">A venir</h5></a>
                    <p class="card-text">Nouveaux produits à venir</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 productColumn">
            <div class="card product">
                <a href="#"><img src="src/public/img/grey.png" class="card-img-top" alt="A venir"></a>
                <div class="card-body">
                <a href="#"><h5 class="card-title">A venir</h5></a>
                    <p class="card-text">Nouveaux produits à venir</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4 productColumn">
            <div class="card product">
                <a href="#"><img src="src/public/img/grey.png" class="card-img-top" alt="A venir"></a>
                <div class="card-body">
                <a href="#"><h5 class="card-title">A venir</h5></a>
                    <p class="card-text">Nouveaux produits à venir</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4 productColumn">
            <div class="card product">
                <a href="#"><img src="src/public/img/grey.png" class="card-img-top" alt="A venir"></a>
                <div class="card-body">
                <a href="#"><h5 class="card-title">A venir</h5></a>
                    <p class="card-text">Nouveaux produits à venir</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4 productColumn">
            <div class="card product">
                <a href="#"><img src="src/public/img/grey.png" class="card-img-top" alt="A venir"></a>
                <div class="card-body">
                <a href="#"><h5 class="card-title">A venir</h5></a>
                    <p class="card-text">Nouveaux produits à venir</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4 productColumn">
            <div class="card product">
                <a href="#"><img src="src/public/img/grey.png" class="card-img-top" alt="A venir"></a>
                <div class="card-body">
                <a href="#"><h5 class="card-title">A venir</h5></a>
                    <p class="card-text">Nouveaux produits à venir</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4 productColumn">
            <div class="card product">
                <a href="#"><img src="src/public/img/grey.png" class="card-img-top" alt="A venir"></a>
                <div class="card-body">
                <a href="#"><h5 class="card-title">A venir</h5></a>
                    <p class="card-text">Nouveaux produits à venir</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>