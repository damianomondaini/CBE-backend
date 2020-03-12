<div class="navbar-fixed">
    <nav>
        <nav class="white" role="navigation">
            <div class="nav-wrapper container">
                <a href="index.php" class="brand-logo"><img id="logo_cpnv" alt="logo_cpnv" src="src\public\img\logo_cpnv.png"></a>

                <ul class="hide-on-med-and-down right">
                        <li><a href="index.php?req=product&productId=1" class="cpnvgreen">Cartes de visites</a></li>
                        <li><a href="index.php?req=dashboard" class="cpnvgreen">Dashboard</a></li>
                        <?php
                            if (isset($_SESSION['surname']))
                            {
                        ?>
                            <li style="color: black;">Bonjour, <?= $_SESSION['surname'] ?></li>
                            <li><a href="index.php?req=signOut" class="cpnvgreen">Se deconnecter</a></li>
                        <?php
                            }
                            else {
                        ?>
                            <li><a href="index.php?req=signInPage" class="cpnvgreen">Se connecter</a></li>
                            <li><a href="index.php?req=signUpPage" class="cpnvgreen">Créer un comptre</a></li>
                        <?php
                            }
                        ?>
                </ul>

                <a href="#" data-target="nav-mobile" class="sidenav-trigger cpnvgreen"><i class="material-icons">menu</i></a>
                <a href="index.php?req=signInPage" class="cpnvgreen right hide-on-large-only"><i class="material-icons">person</i></a>
            </div>
        </nav>
    </nav>
</div>


<ul id="nav-mobile" class="sidenav">
    <li><a href="#">Box natel</a></li>
    <li><a href="#">Cartes de visites</a></li>
    <li><a href="#">Réserver salle multimédia</a></li>
    <?php
        if (isset($_SESSION['surname']))
        {
    ?>
        <li style="color: black;">Bonjour, <?= $_SESSION['surname'] ?></li>
        <li><a href="index.php?req=signOut" class="cpnvgreen">Se deconnecter</a></li>
    <?php
        }
        else {
    ?>
        <li><a href="index.php?req=signInPage" class="cpnvgreen">Se connecter</a></li>
        <li><a href="index.php?req=signUpPage" class="cpnvgreen">Créer un comptre</a></li>
    <?php
        }
    ?>
</ul>