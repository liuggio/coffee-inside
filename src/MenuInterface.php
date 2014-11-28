<?php

namespace Coffee;


interface MenuInterface
{
    /**
     * @param Product $product
     *
     * @return bool
     */
    public function add(Product $product);

    /**
     * @param $productName
     *
     * @return Product|false
     */
    public function getByName($productName);
}