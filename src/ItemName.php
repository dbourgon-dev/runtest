<?php
namespace Runroom\GildedRose;

class ItemName
{
    private $name;

    function __construct(string $name) {
        $this->name = $name;
    }

    public function value(): string {
        return $this->name;
    }

    public function equals(ItemName $name): bool {
        return $this->value() === $name->value();
    }
}
