<?php

namespace Runroom\GildedRose;

use Runroom\GildedRose\ItemName;
use Runroom\GildedRose\ItemSellIn;
use Runroom\GildedRose\ItemQuality;



class Item {

    public ItemName $name;
    public ItemSellIn $sell_in;
    public ItemQuality $quality;

    function __construct(ItemName $name, ItemSellIn $sell_in, ItemQuality $quality) {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function getName(): String {
        return $this->name->value();
    }   
    
    public function getQuality(): int {
        return $this->quality->value();
    }

    public function getSellIn(): int {
        return $this->sell_in->value();
    }

    public function update(): void
    {
        $this->quality->decrease();
        $this->sell_in->decrease();  

        if($this->sell_in->outOfTime()){
            $this->quality->decrease();
        }
    }
 
    public function __toString() {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }



}
