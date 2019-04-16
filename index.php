<?php

  require_once("machine.php");

  $submit = filter_input(INPUT_POST, 'submit');

  if (isset($submit)) {
    //Formulář byl odeslán
    $coins = filter_input(INPUT_POST, 'coins');

    if (buyProduct($insertedCoins)) {
      echo "Bageta připravena.";
    } else {
      echo "Bagetu nelze prodat.";
    }

}
 ?>
<!DOCTYPE html>
<html lang="cs" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>_-_</title>
  </head>
  <body>
    <?php

    $coins=99;

      $myMachine = new Machine();
     ?>

    <p>V automatu je peněz: <?php echo $myMachine->productsCount; ?></p>
    <p>V automatu je baget celkem: <?php echo $myMachine->machineCoins; ?></p>
    <p>Ve výdejním slotu je: <?php echo $myMachine->pickupSlot; ?></p>
    <p>Slot vrácených peněz: <?php echo $myMachine->returnCoinsSlot; ?></p>
<hr>
<h1>Product Machine</h1>
<table>
  <ul>
    <li>Product1 25Kč</li>
  </ul>
</table>
<form action="index.php" method="post">
  <label for="coins"> Coins </label>
  <input type="number" name='coins' value="" />
  <input type="submit" name="submit" value="Odeslat" />
</form>
 <?php
  $myMachine->buyProduct($coins);
  ?>
      <p>V automatu je peněz: <?php echo $myMachine->productsCount; ?></p>
      <p>V automatu je baget celkem: <?php echo $myMachine->machineCoins; ?></p>
      <p>Ve výdejním slotu je: <?php echo $myMachine->pickupSlot; ?></p>
      <p>Slot vrácených peněz: <?php echo $myMachine->returnCoinsSlot; ?></p>


  </body>
</html>
