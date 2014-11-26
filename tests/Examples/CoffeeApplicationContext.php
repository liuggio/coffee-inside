<?php

namespace Coffee\Tests\Examples;

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;

use Money\Money;
use Coffee\Product;
use Coffee\Events;
use Coffee\Commands;
use Coffee\Infrastructure;
use Coffee\Order;
use Coffee\Bill;
use Coffee\Handlers;


class CoffeeApplicationContext implements Context, SnippetAcceptingContext
{
    private $menu;
    private $orderRepository;

    public function __construct()
    {
        $this->menu = new Infrastructure\FileMenuRepository();
        $this->orderRepository =  new Infrastructure\FileOrderRepository();
        $this->dispatcher = new Infrastructure\InMemoryEventDispatcher();
    }

    /**
     * @Given a product named :productName and priced :amount Euro was added to the menu
     */
    public function aProductNamedAndPricedEuroWasAddedToTheMenu($productName, $amount)
    {
        $money = Money::EUR((int) $amount);
        $product = Product::namedAndPriced($productName, $money);
        $this->menu->add($product);
    }

    /**
     * @Given An order has been made for a :productName
     */
    public function anOrderHasBeenMadeForA($productName)
    {
        $product = $this->menu->getByName($productName);
        $order = Order::create($product);
        $this->orderRepository->add($order);
        $this->orderIdentifier = $order->getIdentifier();
    }

    /**
     * @When I emit the bill for that order
     */
    public function iEmitTheBillForThatOrder()
    {
        $emitBillCommand = new Commands\EmitBill($this->orderIdentifier);                    // DTO stupid no logic at all
        $emitBill = new Handlers\EmitBillHandler($this->dispatcher, $this->orderRepository);
        $this->bill = $emitBill($emitBillCommand);
    }

    /**
     * @Then The total amount on the bill should be equal to :amount Euro.
     */
    public function theTotalAmountOnTheBillShouldBeEqualToEuro($amount)
    {
        $money = Money::EUR((int)$amount);
        $total = $this->bill->getTotal();

        if ($total->equals($money)) {
            throw new \Exception("Receipt Price is not " . $amount);
        }
    }
}
