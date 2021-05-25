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
            $item->updateItem();         
        }
    }
}
