<?php

namespace Coffee\Infrastructure;

use Coffee\EventDispatcherInterface;
use Coffee\EventInterface;

class InMemoryEventDispatcher implements EventDispatcherInterface
{
    private $events;

    function __construct()
    {
        $this->events = array();
    }

    function dispatch(EventInterface $event)
    {
        $this->events[] = $event;
    }

    function getDispatchedEvents()
    {
         return $this->events;
    }
} 