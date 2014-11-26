<?php

namespace Coffee\Events;

use Coffee\Bill;
use Coffee\EventInterface;

class BillEmitted implements EventInterface
{
    private $bill;

    public function __construct(Bill $bill)
    {
        $this->bill = $bill;
    }

    /**
     * @return Bill
     */
    public function getBill()
    {
        return $this->bill;
    }
} 