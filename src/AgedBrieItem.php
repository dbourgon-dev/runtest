<<<<<<< HEAD
<?php

namespace Runroom\GildedRose;


class AgedBrieItem extends Item {

    public function update(): void
    {
        $this->quality->increase();
        $this->sell_in->decrease();
        
        if ($this->sell_in->outOfTime()) {
            $this->quality->increase();
        }
    }
}
=======
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
>>>>>>> e05e8ad8bcb9e04c4e32716e91580a2b1040310c
