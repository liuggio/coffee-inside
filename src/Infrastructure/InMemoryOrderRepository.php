<?php

namespace Coffee\Infrastructure;

use Coffee\OrderRepositoryInterface;
use Coffee\Order;

class InMemoryOrderRepository implements OrderRepositoryInterface
{
    private $orders;

    public function add(Order $order)
    {
        $this->orders[(string) $order->getIdentifier()] = $order;
    }

    function fetch($orderIdentifier)
    {
        return  $this->orders[(string) $orderIdentifier];
    }
}