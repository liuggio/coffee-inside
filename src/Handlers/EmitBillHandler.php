<?php

namespace Coffee\Handlers;

use Coffee\Bill;
use Coffee\Commands\EmitBill;
use Coffee\EventDispatcherInterface;
use Coffee\Events\BillEmitted;
use Coffee\OrderRepositoryInterface;

class EmitBillHandler
{
    private $dispatcher;

    public function __construct(EventDispatcherInterface $dispatcher, OrderRepositoryInterface $repository)
    {
        $this->dispatcher = $dispatcher;
        $this->repository = $repository;
    }

    /**
     * @param EmitBill $emitBill
     *
     * @return Bill
     */
    public function __invoke(EmitBill $emitBill)
    {
        $orderIdentifier = $emitBill->getOrderIdentifier();
        $order = $this->repository->fetch($orderIdentifier);

        $bill = Bill::emit($order);
        $event = new BillEmitted($bill);
        $this->dispatcher->dispatch($event);

        return $bill;
    }
} 