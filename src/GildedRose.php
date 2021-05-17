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
                           

            switch($item->getName())
            {
                case Item::AGED_BRIE:
                    $item->increaseQualityBy(1);  
                    $item->decreaseSellInBy(1);  
                    
                    if ($item->hasPassedOut()) {
                        $item->increaseQualityBy(1);
                    }
                    break;
                
                case Item::BACKSTAGE_PASS:
                    $item->increaseQualityBySellIn();   
                   
                    $item->decreaseSellInBy(1);  
                    if($item->hasPassedOut()){
                        $item->loseAllQuality(); 
                    } 
                    break;
                
                case Item::SULFURAS:
                    break;

                default:
                    $item->decreaseQualityBy(1);
                    $item->decreaseSellInBy(1);  

                    if($item->hasPassedOut()){
                        $item->decreaseQualityBy(1); 
                    }
                    break;
            }
          

        }
    }
}
