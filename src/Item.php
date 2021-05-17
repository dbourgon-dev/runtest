<?php

namespace Runroom\GildedRose;

define('MAX_QUALITY', 50);
define('MIN_QUALITY', 0);

class Item {

    public string $name;
    public int $sell_in;
    public int $quality;

    function __construct(string $name, int $sell_in, int $quality) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function getName(): string
    {
        return $this->name;
    }   

    public function updateItem(): void
    {
        $this->decreaseQualityBy(1);
        $this->decreaseSellInBy(1);  

        if($this->hasPassedOut()){
            $this->decreaseQualityBy(1); 
        }
    }

    public function decreaseSellInBy(int $sell_in = 1): void
    {    
        $this->sell_in -= $sell_in;        
    }

    public function increaseQualityBy(int $quality = 1): void
    {       

        if ($this->quality + $quality > MAX_QUALITY) {
            $this->quality = MAX_QUALITY;
            return;
        }
        
        $this->quality += $quality;     
    }

    public function decreaseQualityBy(int $quality = 1): void
    {
        
        if ($this->quality - $quality < MIN_QUALITY) {
            $this->quality = MIN_QUALITY;           
        }else{
            $this->quality -= $quality;
        }
    }    

    public function loseAllQuality(): void {
        $this->quality = 0;
    }

    public function hasPassedOut(): bool{
        return $this->sell_in < 0;
    }

    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

}
