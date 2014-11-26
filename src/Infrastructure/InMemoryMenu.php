<?php


namespace Coffee\Infrastructure;

use Coffee\MenuInterface;
use Coffee\Product;

class InMemoryMenu implements MenuInterface
{
    private $collection;

    function __construct()
    {
        $this->collection = array();
    }

    public function add(Product $product)
    {
        $this->collection[$product->getName()] = $product;
    }

    public function getByName($productName)
    {
        return $this->collection[$productName];
    }
} 