<?php

namespace Coffee\Commands;

use Coffee\Order;

class EmitBill
{
    private $orderIdentifier;

    public function __construct($orderIdentifier)
    {
        $this->orderIdentifier = $orderIdentifier;
    }

    /**
     * @return Order
     */
    public function getOrderIdentifier()
    {
        return $this->orderIdentifier;
    }
}