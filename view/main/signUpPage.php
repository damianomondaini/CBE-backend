<?php $title = 'Créer un compte'; ?>

<?php ob_start(); ?>

<div id="loginbox" class="valign-wrapper">
    <div class="container">
        <div class="card">
            <div class="card-image row">
                <img class="col s6 offset-s3" src="src\public\img\logo_cpnv.png" id="logo">
            </div>
            <div class="card-content">
                <div class="row">
                    <form id="login-form" class="col s12" method="POST" action="index.php?req=addAccount">

                        <div class="input-field col s12">
                            <select name="role">
                                <option disabled selected>Statut</option>
                                <option value="1">Élève CBE</option>
                                <option value="2">Client</option>
                                <option value="3">Admin</option>
                            </select>
                        </div>

                        <div class="input-field col s6">
                            <input name="surname" id="last_name" type="text" class="validate">
                            <label for="last_name">Prénom</label>
                        </div>

                        <div class="input-field col s6">
                            <input name="name" id="first_name" type="text" class="validate">
                            <label for="first_name">Nom</label>
                        </div>

                        <div class="input-field col s12">
                            <input name="email" id="email" type="email" class="validate">
                            <label for="email">Adresse de messagerie</label>
                        </div>

                        <div class="input-field col s12">
                            <input name="password" id="password" type="password" class="validate">
                            <label for="password">Mot de passe</label>
                        </div>

                        <input type="submit" value="Créer">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
    M.AutoInit();
</script>

<?php $content = ob_get_clean(); ?>

<?php require('view/include/template.php'); ?>