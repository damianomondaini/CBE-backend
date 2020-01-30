<?php
    $labels = ['name', 'surname'];
?>

<?php ob_start(); ?>

<form action="index.php?req=addOrder&role=2&productId=1" method="POST">
    <label for="name">Nom</label><br/>
    <input type="text" name="name" id="name"><br/>
    <label for="surname">Prénom</label><br/>
    <input type="text" name="surname" id="surname"><br/>
    <label for="amount">Amount</label><br/>
    <input type="number" name="amount" id="amount"><br/>    
    <input type="submit" value="Envoyer">
</form>

<?php $form = ob_get_clean(); ?>