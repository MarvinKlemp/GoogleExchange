<?php

namespace MarvinKlemp\GoogleExchange;

use MarvinKlemp\Money\Currency\Currency;
use MarvinKlemp\Money\CurrencyExchangerInterface;
use MarvinKlemp\Money\Money\Money;

class GoogleExchange implements CurrencyExchangerInterface
{
    /**
     * @param  Money    $money
     * @param  Currency $to
     * @return Money
     */
    public function exchangeToCurrency(Money $money, Currency $to)
    {
        return new Money($money->amount(), $to);
    }

    /**
     * @param  Currency $from
     * @param  Currency $to
     * @return float
     */
    public function getExchangeRate(Currency $from, Currency $to)
    {
        return 1.11;
    }
}
