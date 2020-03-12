<?php $title = 'CBE'; ?>

<?php ob_start(); ?>


<a href="index.php?req=product&productId=1">
    <div class="parallax-container valign-wrapper">
        <div class="container">
            <div class="center-align">
                <h1 class="white-text">Cartes de visite</h1>
            </div>
        </div>
        <div class="parallax"><img src="src\public\img\background1.jpg" alt="Unsplashed background img 1"></div>
    </div>
</a>

<a href="index.php">
    <div class="parallax-container valign-wrapper">
        <div class="container">
            <div class="center-align">
                <h1 class="white-text">Box téléphone</h1>
            </div>
        </div>
        <div class="parallax"><img src="src\public\img\background2.jpg" alt="Unsplashed background img 1"></div>
    </div>
</a>

<a href="index.php">
    <div class="parallax-container valign-wrapper">
        <div class="container">
            <div class="center-align">
                <h1 class="white-text">Salle Multimédia</h1>
            </div>
        </div>
        <div class="parallax"><img src="src\public\img\background3.jpg" alt="Unsplashed background img 1"></div>
    </div>
</a>

<script>
    M.AutoInit();
</script>


<?php $content = ob_get_clean(); ?>

<?php require('view/include/template.php'); ?>