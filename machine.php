<?php
class Machine
{
    private $machineCoins;

    private $returnCoinsSlot;

    private $pickupSlot;

    private $productCount;

    public function __construct()
    {
        $this->returnCoinsSlot = null;
        $this->pickupSlot = null;
    }

    public function buyProduct($insertedCoins, $productCode)
    {
        if (empty($insertedCoins)) {
            return("Vložte peníze");
        }
        if (empty($productCode)) {
            return("Vyberte si produkt...");
        }

        $machineCoins = $this->getMachineCoins();
        $productName = $this->getProductName($productCode);
        $productPrice = $this->getProductPrice($productCode);
        $productCount = $this->getProductCount($productCode);
        $returnCoins = $insertedCoins - $productPrice;
        if ($insertedCoins >= $productPrice) {
            if ($productCount > 0) {
                if ($machineCoins >= $returnCoins) {
                    $productCount--;
                    $machineCoins -= $returnCoins;
                    $machineCoins += $productPrice;
                    $this->pickupSlot = $productName;
                    $this->returnCoinsSlot = $returnCoins;
                    self::saveChanges($productCode, $productCount, $machineCoins);
                    return true;
                } else {
                    return "Není dostatek peněz na vrácení";
                }
            } else {
                return "Automat je prázdný";
            }
        } else {
            return "Nedostatek peněz!";
        }
    }


    public function getMachineCoins()
    {
        $stats = $this->getStats();
        return $stats['machineCoins'];
    }

    public function getPickupSlot()
    {
        return $this->pickupSlot;
    }

    public function getReturnCoinsSlot()
    {
        return $this->returnCoinsSlot;
    }

    private function getProductName($productCode)
    {
        $stats = $this->getStats();
        return $stats['products'][$productCode]['name'];
    }

    private function getProductPrice($productCode)
    {
        $stats = $this->getStats();
        return $stats['products'][$productCode]['price'];
    }

    private function getProductCount($productCode)
    {
        $stats = $this->getStats();
        return $stats['products'][$productCode]['count'];
    }

    public function getStats($file = "stats.json")
    {
      if (file_exists($file)) {
          return json_decode(file_get_contents($file), true);
      }

    }

    private function saveChange($productCode, $productCount, $machineCoins)
    {
        $stats = $this->getStats();
        $stats['products'][$productCode]['count'] = $productCount;
        $stats['machineCoins'] = $machineCoins;
        file_put_contents("stats.json", json_encode($stats, JSON_PRETTY_PRINT));
        return true;
    }
}
// dik matheewee
