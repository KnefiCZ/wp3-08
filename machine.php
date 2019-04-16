<?php

  class Machine
  {

    public $productsCount;
    public $machineCoins;
    public $returnCoinsSlot;
    public $pickupSlot;

    const PRODUCT_PRICE = 45;

    public function __construct()
    {
      $this->productsCount=file_get_contents("productsCount.txt");
      $this->machineCoins=file_get_contents("machineCoins.txt");
      $this->pickupSlot = null;
    }

    public function buyProduct($insertedCoins) {
      $returnCoins = $insertedCoins - self::PRODUCT_PRICE;
        if (($insertedCoins >= self::PRODUCT_PRICE)
        && ($this->productsCount > 0)
        && ($this->machineCoins >= $returnCoins)){
          $this->productsCount--;
          $this->machineCoins = $machineCoins-=$returnCoins;
          $this->pickupSlot = "produkt";
          $this->returnCoinsSlot = $returnCoins;
        }
     }
  }
