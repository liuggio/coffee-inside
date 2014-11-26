<?php

namespace Coffee;

use Money\Money;

class Bill
{
    private $total;
    private $items;

    private function __construct(Money $total, array $items)
    {
        $this->total = $total;
        $this->assertItemsAreProducts($items);
        $this->items = $items;
    }

    /**
     * @param Order $order
     *
     * @return Bill
     */
    public static function emit(Order $order)
    {
        $total = $order->getTotal();

        return new self($total, $order->getProducts());
    }

    /**
     * @return Money
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @return Product[]
     */
    public function getItems()
    {
        return $this->items;
    }

    private function assertItemsAreProducts($items)
    {
        foreach($items as $product) {
            if (!($product instanceof Product)) {
                throw  new \Exception('Bill should be created only with an array of Product as Items');
            }
        }
    }
} 