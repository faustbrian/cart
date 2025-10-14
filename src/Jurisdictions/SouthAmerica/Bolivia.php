<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Jurisdictions\SouthAmerica;

use BaseCodeOy\Basket\Contracts\Jurisdiction;
use BaseCodeOy\Basket\Contracts\TaxRate;
use BaseCodeOy\Basket\TaxRates\SouthAmerica\BoliviaValueAddedTax;
use Money\Currency;

final readonly class Bolivia implements Jurisdiction
{
    private Currency $currency;

    private BoliviaValueAddedTax $boliviaValueAddedTax;

    /**
     * Bolivia constructor.
     */
    public function __construct()
    {
        $this->boliviaValueAddedTax = new BoliviaValueAddedTax();
        $this->currency = new Currency('BOB');
    }

    /**
     * @return BoliviaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->boliviaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
