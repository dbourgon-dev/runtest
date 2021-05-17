<?php

namespace Runroom\GildedRose;

define('MAX_QUALITY', 50);
define('MIN_QUALITY', 0);

class Item {

    public $name;
    public $sell_in;
    public $quality;

    function __construct($name, $sell_in, $quality) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function getName()
    {
        return $this->name;
    }   

    public function updateItem()
    {
        $this->decreaseQualityBy(1);
        $this->decreaseSellInBy(1);  

        if($this->hasPassedOut()){
            $this->decreaseQualityBy(1); 
        }
    }

    public function decreaseSellInBy($sell_in = 1)
    {    
        $this->sell_in -= $sell_in;        
    }

    public function increaseQualityBy($quality = 1)
    {       

        if ($this->quality + $quality > MAX_QUALITY) {
            $this->quality = MAX_QUALITY;
            return;
        }
        
        $this->quality += $quality;     
    }

    public function decreaseQualityBy($quality = 1)
    {
        
        if ($this->quality - $quality < MIN_QUALITY) {
            $this->quality = MIN_QUALITY;
            return;
        }
        
        $this->quality -= $quality;     
    }    

    public function loseAllQuality(){
        $this->quality = 0;
    }

    public function hasPassedOut(){
        return $this->sell_in < 0;
    }

    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

}
