<?php

namespace MarvinKlemp\GoogleExchange\Tests;

use MarvinKlemp\GoogleExchange\GoogleExchange;
use MarvinKlemp\Money\Currency\Currency;
use MarvinKlemp\Money\CurrencyExchangerInterface;
use MarvinKlemp\Money\Money\Money;

class CurrencyExchangerTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_should_be_initializable()
    {
        $exchanger = new GoogleExchange();

        $this->assertInstanceOf(CurrencyExchangerInterface::class, $exchanger);
    }

    public function test_it_should_exchange_to_currency()
    {
        $money = $this->getMockBuilder(Money::class)->disableOriginalConstructor()->getMock();
        $currencyAfter = $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();

        $exchanger = new GoogleExchange();
        $exchange = $exchanger->exchangeToCurrency($money, $currencyAfter);

        $this->assertSame($exchange->currency(), $currencyAfter);
    }

    public function test_it_should_return_exchange_rate()
    {
        $currencyBefore = $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();
        $currencyAfter = $this->getMockBuilder(Currency::class)->disableOriginalConstructor()->getMock();

        $exchanger = new GoogleExchange();
        $this->assertEquals(1.11, $exchanger->getExchangeRate($currencyBefore, $currencyAfter));
    }
}
