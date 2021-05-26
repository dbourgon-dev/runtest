<?php
namespace Runroom\GildedRose;


class ItemQuality
{
    private $quality;    
    const MAX_QUALITY = 50;
    const MIN_QUALITY = 0;

    public function __construct (int $quality) {
        $this->quality = $quality;
    }

    public function value(): int {
        return $this->quality;
    }

    public function equals(ItemSellIn $quality): bool {
        return $this->value() === $quality->value();
    }

    public function increase(int $increment = 1): ItemQuality
    {       

        if ($this->quality + $increment > self::MAX_QUALITY) {
            $this->quality = self::MAX_QUALITY;
            return  new ItemQuality($this->quality);
        }
        
        $this->quality += $increment;
        
        return new ItemQuality($this->quality);
    }


    public function decrease(int $quality = 1): ItemQuality
    {        
        if ($this->quality - $quality <  self::MIN_QUALITY) {
            $this->quality =  self::MIN_QUALITY;           
        }else{
            $this->quality -= $quality;
        }
        return new ItemQuality($this->quality);
    }  

    public function reset(): void {
        $this->quality = 0;
    }
}
