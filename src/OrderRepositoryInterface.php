<?php

namespace Coffee;

interface OrderRepositoryInterface
{
    /**
     * @param Order $order
     *
     * @return bool
     */
    function add(Order $order);

    /**
     * @param $orderIdentifier
     *
     * @return Order
     */
    function fetch($orderIdentifier);
} 