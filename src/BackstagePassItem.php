<?php

namespace Runroom\GildedRose;


class BackstagePassItem extends Item {

    public function updateItem(): void
    {
        $this->increaseQualityForBackstagePass();                      
        $this->decreaseSellInBy(1);  
        
        if($this->hasPassedOut()){
            $this->loseAllQuality(); 
        } 
    }

    public function increaseQualityForBackstagePass(): void
    {
       
        $this->increaseQualityBy(1);

        if ($this->sell_in < 11) {
            $this->increaseQualityBy(1);
        }
        if ($this->sell_in < 6) {
            $this->increaseQualityBy(1);
        }
                
    }
}
