<<<<<<< HEAD
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
=======
<?php

namespace Runroom\GildedRose;


class BackstagePassItem extends Item {

    public function updateItem() 
    {
        $this->increaseQualityForBackstagePass();                      
        $this->decreaseSellInBy(1);  
        
        if($this->hasPassedOut()){
            $this->loseAllQuality(); 
        } 
    }

    public function increaseQualityForBackstagePass()
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
>>>>>>> e05e8ad8bcb9e04c4e32716e91580a2b1040310c
