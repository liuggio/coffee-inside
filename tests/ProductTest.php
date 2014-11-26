<?php

namespace Coffee\Order\Tests;

use Coffee\Product;
use Money\Money;

class ProductTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_create_a_new_product_from_name_and_amount_in_euro()
    {
        $money = Money::EUR(10);
        $product = Product::namedAndPriced('named', $money);
        $this->assertInstanceOf('Coffee\Product', $product);
    }
}
 