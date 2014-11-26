<?php

namespace Coffee\Order\Tests;

use Coffee\Order;
use Coffee\Product;
use Money\Money;

class OrderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_create_a_new_order()
    {
        $product = Product::namedAndPriced('name', Money::EUR(10));
        $order = Order::create($product);
        $this->assertInstanceOf('Coffee\Order', $order);
    }
}
 