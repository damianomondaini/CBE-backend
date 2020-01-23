<?php $title = 'Test'; ?>

<?php ob_start(); ?>

<section class="testProduct container">
    <div class="row">
        <div class="col-sm-12">
            <div class="test">
                <div class="card-header">Test Formulaire</div>
                <img src="src/public/img/carte-visite.jpg" class="card-img-top" alt="Test">
                <div class="card-body">
                    <h2>Description</h2>
                    <p class="card-text">Test Formulaire</p>
                    <h2>Personnalisation</h2>
                    <form action="index.php?req=addOrder&role=1" method="POST">
                        <div class="form-group">
                            <label for="testFirst">One</label>
                            <input type="text" class="form-control" id="testFirst" name="testFirst" required>
                        </div>
                        <div class="form-group">
                            <label for="TestSecond">Two</label>
                            <input type="text" class="form-control" id="TestSecond" name="TestSecond" required>
                        </div>
                        <div class="form-group">
                            <label for="TestThird">Three</label>
                            <input type="text" class="form-control" id="TestThird" name="TestThird" required>
                        </div>
                        <div class="form-group">
                            <label for="testFourth">Four</label>
                            <input type="number" class="form-control" id="testFourth" name="testFourth" required>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="fifth" id="fifth"
                                value="1" checked>
                            <label class="form-check-label" for="fifth">
                                Five
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sixth" id="sixth"
                                value="2">
                            <label class="form-check-label" for="sixth">
                                Six
                            </label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="testSeventh" name="testSeventh">
                            <label class="form-check-label" for="testSeventh">Seven</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>