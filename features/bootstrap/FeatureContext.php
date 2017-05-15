<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

use PHPUnit\Framework\Assert as PHPUnit_Framework_Assert;
/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $shelf;
    private $basket;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
	$this->shelf = new Shelf();
	$this->basket = new Basket($this->shelf);
    }

    /**
     * @Given there is a :product, which costs £:costs
     */
    public function thereIsAWhichCostsPs($product, $price)
    {
        $this->shelf->setProductPrice($product, floatval($price));
    }

    /**
     * @When I add the :product to the basket
     */
    public function iAddTheToTheBasket($product)
    {
        $this->basket->addProduct($product);
    }

    /**
     * @Then I should have :arg1 product in the basket
     */
    public function iShouldHaveProductInTheBasket($arg1)
    {
	PHPUnit_Framework_Assert::assertCount(
		intval($arg1),
		$this->basket
	);
    }

    /**
     * @Then the overall basket price should be £:price
     */
    public function theOverallBasketPriceShouldBePs($price)
    {
	PHPUnit_Framework_Assert::assertSame(
		floatval($price),
		$this->basket->getTotalPrice()
	);
    }

    /**
     * @Then I should have :count products in the basket
     */
    public function iShouldHaveProductsInTheBasket($count)
    {
	PHPUnit_Framework_Assert::assertCount(
		intval($count),
		$this->basket
	);
    }
}
