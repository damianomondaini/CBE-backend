<?php $title = 'Carte de visite'; ?>

<?php ob_start(); ?>

<section class="cardProduct container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">Carte de visite</div>
                <img src="src/public/img/carte-visite.jpg" class="card-img-top" alt="Carte de visite">
                <div class="card-body">
                    <h2>Description</h2>
                    <p class="card-text">Votre splendide carte de visite pour les visites de stage par exemple !</p>
                    <h2>Personnalisation</h2>
                    <form action="index.php?action=addOrder" method="POST">
                        <div class="form-group">
                            <label for="firstName">Prénom</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Nom</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" required>
                        </div>
                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="amount">Quantité</label>
                            <input type="number" class="form-control" id="amount" name="amount" required>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="design" id="design1"
                                value="1" checked>
                            <label class="form-check-label" for="design1">
                                Design 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="design" id="design2"
                                value="2">
                            <label class="form-check-label" for="design2">
                                Design 2
                            </label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="appointment" name="appointment">
                            <label class="form-check-label" for="appointment">Je suis disponible pour un
                                rendez-vous</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>