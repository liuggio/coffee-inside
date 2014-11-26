<?php

namespace Coffee\Infrastructure;

use Coffee\Order;
use Coffee\OrderRepositoryInterface;
use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\FilesystemCache;

class FileOrderRepository implements OrderRepositoryInterface
{
    private $storage;

    function __construct(Cache $storage = null)
    {
        $this->storage = $storage?:new FilesystemCache(sys_get_temp_dir());
    }

    function add(Order $order)
    {
        $this->storage->save($order->getIdentifier(), serialize($order));
    }

    function fetch($orderIdentifier)
    {
        return unserialize($this->storage->fetch($orderIdentifier));
    }
} 