<?php
    $labels = ['inputA', 'inputB'];
?>

<?php ob_start(); ?>

<form action="index2.php?req=addOrder&role=2&productId=2" method="POST">
    <label for="inputA">InputA</label><br/>
    <input type="text" name="inputA" id="inputA"><br/>
    <label for="inputB">InputB</label><br/>
    <input type="text" name="inputB" id="inputB"><br/>
    <label for="amount">Amount</label><br/>
    <input type="number" name="amount" id="amount"><br/>
    <input type="submit" value="Envoyer">
</form>

<?php $form = ob_get_clean(); ?>