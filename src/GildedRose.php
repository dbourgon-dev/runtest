<?php

namespace Runroom\GildedRose;

define('AGED_BRIE', 'Aged Brie');
define('BACKSTAGE_PASS', 'Backstage passes to a TAFKAL80ETC concert');
define('SULFURAS', 'Sulfuras, Hand of Ragnaros');


class GildedRose {

    private $items;

    function __construct($items) {
        $this->items = $items;
    }

    function update_quality() {
        
        foreach ($this->items as $item) {
            
           
            $item->updateItemByType();           
          

        }
    }
}
