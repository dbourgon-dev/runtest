<?php

namespace Runroom\GildedRose\Tests;

use PHPUnit\Framework\TestCase;
use Runroom\GildedRose\GildedRose;
use Runroom\GildedRose\Item;

use Runroom\GildedRose\AgedBrieItem;
use Runroom\GildedRose\BackstagePassItem;
use Runroom\GildedRose\ItemName;
use Runroom\GildedRose\ItemSellIn;
use Runroom\GildedRose\ItemQuality;
use Runroom\GildedRose\SulfurasItem;

class GildedRoseTest extends TestCase
{
    /**
     * @test
     */
    public function itemsDegradeQuality(): void
    {
      $items = [new Item( new ItemName('') , new ItemSellIn(1), new ItemQuality(5))];

  		$gilded_rose = new GildedRose($items);
        $gilded_rose->update_quality();

        $this->assertEquals(4, $items[0]->getQuality());
  	}

    /**
     * @test
     */
    public function itemsDegradeDoubleQualityOnceTheSellInDateHasPass(): void
    {
  		$items = [new Item(new ItemName(''),  new ItemSellIn(-1), new ItemQuality(5))];

  		$gilded_rose = new GildedRose($items);
        $gilded_rose->update_quality();

  		$this->assertEquals(3, $items[0]->getQuality());
  	}

    /**
     * @test
     */
    public function itemsCannotHaveNegativeQuality(): void
    {
  		$items = [new Item(new ItemName(''),  new ItemSellIn(0), new ItemQuality(0))];

  		$gilded_rose = new GildedRose($items);
        $gilded_rose->update_quality();

  		$this->assertEquals(0, $items[0]->getQuality());
  	}

    /**
     * @test
     */
    public function agedBrieIncreasesQualityOverTime(): void
    {
  		$items = [new AgedBrieItem(new ItemName('Aged Brie'),  new ItemSellIn(0), new ItemQuality(5))];

        $gilded_rose = new GildedRose($items);
        $gilded_rose->update_quality();

        print_r($gilded_rose);

  		$this->assertEquals(7, $items[0]->getQuality());
  	}

    /**
     * @test
     */
    public function qualityCannotBeGreaterThan50(): void
    {
  		$items = [new AgedBrieItem(new ItemName('Aged Brie'),  new ItemSellIn(0), new ItemQuality(50))];

        $gilded_rose = new GildedRose($items);
        $gilded_rose->update_quality();

  		$this->assertEquals(50, $items[0]->getQuality());
  	}

    /**
     * @test
     */
    public function sulfurasDoesNotChange(): void 
    {
  		$items = [new SulfurasItem(new ItemName('Sulfuras, Hand of Ragnaros'),  new ItemSellIn(10), new ItemQuality(10))];

        $gilded_rose = new GildedRose($items);
        $gilded_rose->update_quality();

  		$this->assertEquals(10, $items[0]->getSellIn());
  		$this->assertEquals(10, $items[0]->getQuality());
  	}

     /**
      * @return array<string, array>
      */
    public static function backstageRules(): array
    {
  		return [
  			'incr. 1 if sellIn > 10' => [11, 10, 11],
  			'incr. 2 if 5 < sellIn <= 10 (max)' => [10, 10, 12],
  			'incr. 2 if 5 < sellIn <= 10 (min)' => [6, 10, 12],
  			'incr. 3 if 0 < sellIn <= 5 (max)' => [5, 10, 13],
  			'incr. 3 if 0 < sellIn <= 5 (min)' => [1, 10, 13],
  			'puts to 0 if sellIn <= 0 (max)' => [0, 10, 0],
  			'puts to 0 if sellIn <= 0 (...)' => [-1, 10, 0],
  		];
  	}

    /**
     * @dataProvider backstageRules
     * @test
     * @param mixed $sellIn
     * @param mixed $quality
     * @param mixed $expected
     */
    public function backstageQualityIncreaseOverTimeWithCertainRules(int $sellIn, int $quality, int $expected): void
    {
  		$items = [new BackstagePassItem(new ItemName('Backstage passes to a TAFKAL80ETC concert'), new ItemSellIn($sellIn), new ItemQuality($quality))];

        $gilded_rose = new GildedRose($items);
        $gilded_rose->update_quality();

  		$this->assertEquals($expected, $items[0]->getQuality());
  	}
}
