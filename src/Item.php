<?php

namespace Runroom\GildedRose;

define('MAX_QUALITY', 50);
define('MIN_QUALITY', 0);

class Item {

    public $name;
    public $sell_in;
    public $quality;

    const AGED_BRIE = 'Aged Brie';
    const BACKSTAGE_PASS = 'Backstage passes to a TAFKAL80ETC concert';
    const SULFURAS = 'Sulfuras, Hand of Ragnaros';

    function __construct($name, $sell_in, $quality) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function getName()
    {
        return $this->name;
    }


    public function updateItemByType() 
    {        
        switch($this->getName())
        {
            case Item::AGED_BRIE:
                $this->increaseQualityBy(1);  
                $this->decreaseSellInBy(1);  
                
                if ($this->hasPassedOut()) {
                    $this->increaseQualityBy(1);
                }
                break;
            
            case Item::BACKSTAGE_PASS:
                $this->increaseQualityForBackstagePass();                      
                $this->decreaseSellInBy(1);  
                
                if($this->hasPassedOut()){
                    $this->loseAllQuality(); 
                } 
                break;
            
            case Item::SULFURAS:
                break;

            default:
                $this->decreaseQualityBy(1);
                $this->decreaseSellInBy(1);  

                if($this->hasPassedOut()){
                    $this->decreaseQualityBy(1); 
                }
                break;
        }
    }

    public function decreaseSellInBy($sell_in = 1)
    {   
        if ($this->getName() === static::SULFURAS)  return;
        
        $this->sell_in -= $sell_in;
        
    }

    public function increaseQualityBy($quality = 1)
    {
        if ($this->getName() === static::SULFURAS)  return;

        if ($this->quality + $quality > MAX_QUALITY) {
            $this->quality = MAX_QUALITY;
            return;
        }
        
        $this->quality += $quality;     
    }

    public function decreaseQualityBy($quality = 1)
    {
        if ($this->getName() === static::SULFURAS)  return;
        
        if ($this->quality - $quality < MIN_QUALITY) {
            $this->quality = MIN_QUALITY;
            return;
        }
        
        $this->quality -= $quality;     
    }

    public function increaseQualityForBackstagePass()
    {
        if ($this->getName() === static::BACKSTAGE_PASS) {
           $this->increaseQualityBy(1);

            if ($this->sell_in < 11) {
                $this->increaseQualityBy(1);
            }
            if ($this->sell_in < 6) {
                $this->increaseQualityBy(1);
            }
        }        
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
