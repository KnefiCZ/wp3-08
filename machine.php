<?php

  class Machine
  {
    private $machineCoins;
    private $returnCoinsSlot;
    private $pickupSlot;
    private $Products;

    public function __construct()
    {
      $this->productsCount=file_get_contents("productsCount.txt");
      $this->machineCoins=file_get_contents("machineCoins.txt");
      $this->Products = array (
        "1A" => array('name' => "bageta",
                      'price'=> 45,
                      'count'=> file_get_contents("1A.txt")
      ),
        "2C" => array('name' => "toast",
                      'price'=> 39,
                      'count'=> file_get_contents("2C.txt")
      ),
        "3B" => array('name' => "snack",
                      'price'=> 15,
                      'count'=> file_get_contents("3B.txt")
      ),
      );
    $this->pickupSlot = null;
    }

    public function buyProduct($insertedCoins, $Product = 1) {
      $returnCoins = $insertedCoins - $this->Products[$productNumber]['price'];
        if (($insertedCoins >= $this->Products[$productNumber]['price'])
        && ($this->productsCount > 0)
        && ($this->machineCoins >= $returnCoins)){
          $this->productsCount--;
          file_put_contents("productsCount.txt", $this->productsCount);
          $this->machineCoins-=$returnCoins;
          file_put_contents("machineCoins.txt", $this->machineCoins);
          $this->pickupSlot = "Produkt";
          $this->returnCoinsSlot = $returnCoins;
          return true;
        }
        else {          }
        return false;
     }
     public function getProduct() {
       return $this->Product;
     }

     public function getProductsCount() {
       $productsCount = 0;
       foreach ($this->Product as $product) {
          $productsCount += $product['count'];
       }
     }

     public function getMachineCoins() {
       return $this->machineCoins;
     }

     public function getReturnCoinsSlot() {
       return $this->returnCoinsSlot;
     }

     public function getPickupSlot() {
       if (empty($this->pickupSlot)) {
         $this->pickupSlot = 'prázdný';
       }
       return $this->pickupSlot;
     }
  }
