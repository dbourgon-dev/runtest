<?php
namespace Runroom\GildedRose;


class ItemSellIn
{
    private int $sell_in;
    private const MIN_THRESHOLD = 0;


    public function __construct (int $sell_in) {
        $this->sell_in = $sell_in;
    }

    public function value(): int {
        return $this->sell_in;
    }

    public function equals(ItemSellIn $sell_in): bool {
        return $this->value() === $sell_in->value();
    }

    public function increase() {
        return new  ItemSellIn($this->sell_in + 1);
    }
    public function decrease() {
        return new  ItemSellIn($this->sell_in - 1);
    }

    public function outOfTime(){
        return $this->value() <= self::MIN_THRESHOLD;
    }
}