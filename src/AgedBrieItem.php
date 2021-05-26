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
