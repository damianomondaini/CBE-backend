<?php
    $labels = ['design', 'amount', 'surname', 'name', 'phone'];
?>

<?php ob_start(); ?>

<!-- Formulaire-->
<form method="post" action="index.php?req=addOrder&productId=1">

    <!-- Image Large 
type input = radio bouton-->
    <div class="card-panel grey lighten-5 z-depth-1 col s12" id="carte">
        <div class="row">
            <div id="carte1" class="col s12"><img id="img_cv" src="src/public/img/card/carte2.png" alt=""></div>
            <div id="carte2" class="col s12"><img id="img_cv" src="src/public/img/card/carte3.png" alt=""></div>
            <div id="carte3" class="col s12"><img id="img_cv" src="src/public/img/card/carte4.png" alt=""></div>
            <div id="carte4" class="col s12"><img id="img_cv" src="src/public/img/card/carte5.jpg" alt=""></div>

            <!-- Image Small -->
            <div class="col s12">
                <ul class="tabs grey lighten-5">
                    <li class="tab col s3"><a href="#carte1" id="btn-design1" class="active grey lighten-5"><img
                                id="s_img_cv" src="src/public/img/card/carte2.png" alt=""></a></li>
                    <li class="tab col s3"><a href="#carte2" id="btn-design2" class="grey lighten-5"><img id="s_img_cv"
                                src="src/public/img/card/carte3.png" alt=""></a></li>
                    <li class="tab col s3"><a href="#carte3" id="btn-design3" class="grey lighten-5"><img id="s_img_cv"
                                src="src/public/img/card/carte4.png" alt=""></a></li>
                    <li class="tab col s3"><a href="#carte4" id="btn-design4" class="grey lighten-5"><img id="s_img_cv"
                                src="src/public/img/card/carte5.jpg" alt=""></a></li>
                </ul>
                <input id="selection-carte" name="design" type="number" value="1" style="display: none;"/>
            </div>
        </div>
    </div>



    <h1>CARTE DE VISITE</h1>
    <h2 class="t-nombre">Nombre</h2>
    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input type="number" id="autocomplete-number" class="autocomplete" name="amount">
                    <label for="autocomplete-input">Nombre</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="autocomplete-prenom" class="autocomplete" name="surname">
                    <label for="autocomplete-input">Prénom</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="autocomplete-nom" class="autocomplete" name="name">
                    <label for="autocomplete-input">Nom</label>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="autocomplete-tel" class="autocomplete" name="phone">
                    <label for="autocomplete-input">N° de téléphone</label>
                    <span class="blue-text text-darken-2"></span>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Trigger - bouton commander -->
    <a class="modal-trigger" id="commander" href="#modal1">
        <input type="submit" name="commande-envoyer" Value="commander" class="waves-effect waves-light btn">
    </a>
</form>
<!--<a class=" waves-effect waves-light btn black z-depth-1" id="commander" href="mailto:william.broch@cpnv.ch" onclick="openModal1()">commander</a>
</form>
-->
<div class="row" id="infos">
    <h3 id="info_papier">Format : 85x55mm</h3>
    <h3 id="info_papier">Papier : 200g</h3>
</div>

<!--JavaScript at end of body for optimized loading-->
<script>
    M.AutoInit();
</script>
<!-- Sélection carte de visite -->
<script>
    $(function () {
        $('#btn-design1').click(function () {
            $('input[name=design]').attr('value', '1');
        });

        $('#btn-design2').click(function () {
            $('input[name=design]').attr('value', '2');
        });

        $('#btn-design3').click(function () {
            $('input[name=design]').attr('value', '3');
        });

        $('#btn-design4').click(function () {
            $('input[name=design]').attr('value', '4');
        });

        // Handler for .ready() called.
    });
</script> <!-- initialise les composant materialize js -->

<?php $form = ob_get_clean(); ?>