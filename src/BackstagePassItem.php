<?php

namespace Runroom\GildedRose;


class BackstagePassItem extends Item {

    public function update(): void
    {
        $this->increaseQualityForBackstagePass();                      
        $this->sell_in->decrease();  
        
        if($this->sell_in->outOfTime()){
            $this->quality->reset(); 
        } 
    }

    public function increaseQualityForBackstagePass(): void
    {       
        $this->quality->increase();

        if ($this->sell_in->value() < 11) {
            $this->quality->increase();
        }
        if ($this->sell_in->value() < 6) {
            $this->quality->increase();
        }
                
    }
}
