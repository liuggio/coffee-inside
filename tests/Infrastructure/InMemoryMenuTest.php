<?php

namespace Coffee\Tests\Infrastructure;

use Coffee\Infrastructure\InMemoryMenu;
use Coffee\Product;
use Money\Money;

class InMemoryMenuTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_add_a_product()
    {
        $menu = new InMemoryMenu();
        $product = Product::namedAndPriced('hot chili', Money::EUR(10));

        $this->assertNotFalse($menu->add($product));
    }

    /**
     * @test
     */
    public function should_retrieve_a_product_by_its_name()
    {
        $menu = new InMemoryMenu();
        $productToAssert = Product::namedAndPriced('hot chili', Money::EUR(10));
        $menu->add($productToAssert);

        $this->assertEquals($productToAssert, $menu->getByName('hot chili'));
    }
}
 