<?php

namespace Coffee\Order\Tests;

use Coffee\Bill;
use Coffee\Order;
use Coffee\Product;
use Money\Money;

class BillTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_create_a_new_bill_emitting()
    {
        $product = Product::namedAndPriced('name', Money::EUR(10));
        $order = Order::create($product);
        $bill = Bill::emit($order);
        $this->assertInstanceOf('Coffee\Bill', $bill);
    }
}
 