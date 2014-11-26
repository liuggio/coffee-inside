<?php

namespace Coffee;

interface EventDispatcherInterface
{
    function dispatch(EventInterface $event);

    function getDispatchedEvents();
} 