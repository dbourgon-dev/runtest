<<<<<<< HEAD
<?php

namespace Runroom\GildedRose;


class SulfurasItem extends Item {

    public function update(): void
    {
       
    }  
}
=======
<?php

namespace Runroom\GildedRose;


class SulfurasItem extends Item {

    public function updateItem() 
    {
        return;
    }

    public function decreaseSellInBy($sell_in = 1){
        return;
    }

    public function increaseQualityBy($quality = 1)
    {
        return;
    }

    public function decreaseQualityBy($quality = 1){
        return;
    }
}
>>>>>>> e05e8ad8bcb9e04c4e32716e91580a2b1040310c
