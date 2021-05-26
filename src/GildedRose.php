<?php

namespace Runroom\GildedRose;

class GildedRose {
    
    private $items;

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
