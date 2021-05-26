<<<<<<< HEAD
<?php

namespace Runroom\GildedRose;

class GildedRose {
    /**
     * @var array<Item> $items
     */
    private array $items;

    /**
     * @param array<Item> $items
     */
    function __construct(array $items) {
        $this->items = $items;
    }

    function update_quality():void  {
        
        foreach ($this->items as $item) {
            $item->update();         
        }
    }
}
=======
<?php

namespace Runroom\GildedRose;

class GildedRose {

    private $items;

    function __construct($items) {
        $this->items = $items;
    }

    function update_quality() {
        
        foreach ($this->items as $item) {
            $item->updateItem();         
        }
    }
}
>>>>>>> e05e8ad8bcb9e04c4e32716e91580a2b1040310c
