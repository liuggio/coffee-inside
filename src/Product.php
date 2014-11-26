<?php

namespace Coffee;

use Money\Money;

class Product
{
    private $name;
    private $price;

    public function __construct($name, Money $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public static function namedAndPriced($name, Money $money)
    {
        return new self($name, $money);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Money
     */
    public function getPrice()
    {
        return $this->price;
    }
} 