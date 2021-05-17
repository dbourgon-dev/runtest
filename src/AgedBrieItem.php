<?php

namespace Runroom\GildedRose;


class AgedBrieItem extends Item {

    public function updateItem() 
    {
        $this->increaseQualityBy(1);
        $this->decreaseSellInBy(1);
        
        if ($this->hasPassedOut()) {
            $this->increaseQualityBy(1);
        }
    }
}
