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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\NewJerseyValueAddedTax;
use Money\Currency;

final readonly class NewJersey implements Jurisdiction
{
    private Currency $currency;

    private NewJerseyValueAddedTax $newJerseyValueAddedTax;

    /**
     * NewJersey constructor.
     */
    public function __construct()
    {
        $this->newJerseyValueAddedTax = new NewJerseyValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return NewJerseyValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->newJerseyValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
