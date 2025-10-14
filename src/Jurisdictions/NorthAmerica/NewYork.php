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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\NewYorkValueAddedTax;
use Money\Currency;

final readonly class NewYork implements Jurisdiction
{
    private Currency $currency;

    private NewYorkValueAddedTax $newYorkValueAddedTax;

    /**
     * NewYork constructor.
     */
    public function __construct()
    {
        $this->newYorkValueAddedTax = new NewYorkValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return NewYorkValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->newYorkValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
