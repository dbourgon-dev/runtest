<?php
namespace Runroom\GildedRose;

class ItemName
{
    private String $name;

    public function __construct(String $name) {
        $this->name = $name;
    }

    public function value(): String {
        return $this->name;
    }

    public function equals(ItemName $name): bool {
        return $this->value() === $name->value();
    }
}
