<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Jurisdictions\NorthAmerica;

use BaseCodeOy\Basket\Contracts\Jurisdiction;
use BaseCodeOy\Basket\Contracts\TaxRate;
use BaseCodeOy\Basket\TaxRates\NorthAmerica\NewHampshireValueAddedTax;
use Money\Currency;

final readonly class NewHampshire implements Jurisdiction
{
    private Currency $currency;

    private NewHampshireValueAddedTax $newHampshireValueAddedTax;

    /**
     * NewHampshire constructor.
     */
    public function __construct()
    {
        $this->newHampshireValueAddedTax = new NewHampshireValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return NewHampshireValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->newHampshireValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
