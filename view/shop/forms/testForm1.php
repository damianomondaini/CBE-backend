<?php
    $labels = ['input1', 'input2'];
?>

<?php ob_start(); ?>

<form action="index2.php?req=addOrder&role=2&productId=1" method="POST">
    <label for="input1">input1</label><br/>
    <input type="text" name="input1" id="input1"><br/>
    <label for="input2">input2</label><br/>
    <input type="text" name="input2" id="input2"><br/>
    <label for="amount">Amount</label><br/>
    <input type="number" name="amount" id="amount"><br/>    
    <input type="submit" value="Envoyer">
</form>

<?php $form = ob_get_clean(); ?>