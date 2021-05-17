<?php

namespace Runroom\GildedRose;

define('AGED_BRIE', 'Aged Brie');
define('BACKSTAGE_PASS', 'Backstage passes to a TAFKAL80ETC concert');
define('SULFURAS', 'Sulfuras, Hand of Ragnaros');

use Item;

class GildedRose {

    private $items;

    function __construct($items) {
        $this->items = $items;
    }

    function update_quality() {
        foreach ($this->items as $item) {
        

            if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->quality > 0) {
                    if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                        $item->decreaseQualityBy(1);
                    }
                }
            } else {
                if ($item->quality < 50) {
                    $item->increaseQualityBy(1);     
                    if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->sell_in < 11) {                            
                            $item->increaseQualityBy(1);  
                        }
                        if ($item->sell_in < 6) {                            
                            $item->increaseQualityBy(1);                            
                        }
                    }
                }
            }

            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                $item->decreaseSellInBy(1);                
            }

            if ($item->sell_in < 0) {
                if ($item->name != 'Aged Brie') {
                    if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->quality > 0) {
                            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                                $item->decreaseQualityBy(1);                                
                            }
                        }
                    } else {
                        $item->decreaseQualityBy($item->quality);
                    }
                } else {
                    if ($item->quality < 50) {
                        $item->increaseQualityBy(1);
                    }
                }
            }
        }
    }
}
