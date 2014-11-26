<?php

namespace Coffee;


interface MenuInterface
{
    public function add(Product $product);

    public function getByName($productName);
}