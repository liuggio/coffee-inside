<?php

namespace Coffee\Tests\Examples;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;

use Coffee\Events;
use Coffee\Commands;
use Coffee\Infrastructure;
use Coffee\Handlers;

class CoffeePresentationContext implements Context, SnippetAcceptingContext
{
    private $menu;
    private $orderRepository;

    public function __construct()
    {
        $this->menu = new Infrastructure\InMemoryMenu();
        $this->orderRepository =  new Infrastructure\InMemoryOrderRepository();
    }

    /**
     * @Given a product named :productName and priced :amount Euro was added to the menu
     */
    public function aProductNamedAndPricedEuroWasAddedToTheMenu($productName, $amount)
    {
        throw new PendingException();
    }

    /**
     * @Given An order has been made for a :productName
     */
    public function anOrderHasBeenMadeForA($productName)
    {
        throw new PendingException();
    }

    /**
     * @When I emit the bill for that order
     */
    public function iEmitTheBillForThatOrder()
    {
        throw new PendingException();
    }

    /**
     * @Then The total amount on the bill should be equal to :amount Euro.
     */
    public function theTotalAmountOnTheBillShouldBeEqualToEuro($amount)
    {
        throw new PendingException();
    }
}
