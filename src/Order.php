<?php

namespace Coffee;

use Money\Money;
use Rhumsaa\Uuid\Uuid;

class Order
{
    private $identifier;
    private $products;

    function __construct(Product $product)
    {
        $this->identifier = (string) Uuid::uuid4();
        $this->products = [$product];
    }

    public static function create(Product $product)
    {
        return new self($product);
    }

    /**
     * @return Uuid
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return Product[]
     */
    public function getProducts()
    {
        return $this->products;
    }

    public function getTotal()
    {
        $total = Money::EUR(0);
        foreach ($this->products as $product) {
            $total->add($product->getPrice());
        }

        return $total;
    }
} 