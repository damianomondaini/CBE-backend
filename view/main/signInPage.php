<?php $title = 'Se connecter'; ?>

<?php ob_start(); ?>

<div id="loginbox" class="valign-wrapper">
    <div class="container">
        <div class="card">
            <div class="card-image row">
                <img class="col s6 offset-s3" src="src\public\img\logo_cpnv.png" id="logo">
            </div>
            <div class="card-content">
                <div class="row">
                    <form id="login-form" class="col s12" method="POST" action="index.php?req=signIn">

                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="email">
                            <label for="email">Adresse de messagerie</label>
                        </div>

                        <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password">
                            <label for="password">Mot de passe</label>
                        </div>

                        <input type="submit" value="Se connecter">

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