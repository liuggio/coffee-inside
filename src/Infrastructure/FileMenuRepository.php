<?php

namespace Coffee\Infrastructure;

use Coffee\MenuInterface;
use Coffee\Product;
use Doctrine\Common\Cache\Cache;
use Doctrine\Common\Cache\FilesystemCache;

class FileMenuRepository implements MenuInterface
{
    private $storage;

    function __construct(Cache $storage = null)
    {
        $this->storage = $storage?:new FilesystemCache(sys_get_temp_dir());
    }

    function add(Product $product)
    {
        $this->storage->save($product->getName(), serialize($product));
    }

    function getByName($productName)
    {
        return unserialize($this->storage->fetch($productName));
    }
} 