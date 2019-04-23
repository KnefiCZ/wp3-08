<?php
  require_once("machine.php");
 ?>
<!DOCTYPE html>
<html lang="cs" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>_-_</title>
  </head>
  <body>
    <?php

    $insertedCoins = 50;
      $myMachine = new Machine();
     ?>

<h1>Product Machine</h1>
<table>
  <ul>
    <li>Product 1 : 45Kč <input type="radio" name="product1" value="" /> </li>
    <li>Product 2 : 45Kč <input type="radio" name="product2" value="" /> </li>
  </ul>
</table>
<form action="index.php" method="post">
  <label for="coins"> Coins: </label>
  <?php echo $insertedCoins; ?>
  <input type="number" name='insertedCoins' value="" />
  <input type="submit" name="submit" value="Odeslat" />
</form>
 <?php
  $myMachine->buyProduct($insertedCoins, "2C");
  ?>
      <p>V automatu je peněz: <?php echo $myMachine->getMachineCoins(); ?></p>
      <p>V automatu je baget celkem: <?php echo $myMachine->getProductsCount(); ?></p>
      <p>Ve výdejním slotu je: <b> <?php echo $myMachine->getPickupSlot(); echo $myMachine->getProduct(); ?> </b> </p>
      <p>Slot vrácených peněz: <b> <?php echo $myMachine->getReturnCoinsSlot(); ?> </b> </p>


  </body>
</html>
