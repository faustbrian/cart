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
use BaseCodeOy\Basket\TaxRates\SouthAmerica\GuyanaValueAddedTax;
use Money\Currency;

final readonly class Guyana implements Jurisdiction
{
    private Currency $currency;

    private GuyanaValueAddedTax $guyanaValueAddedTax;

    /**
     * Guyana constructor.
     */
    public function __construct()
    {
        $this->guyanaValueAddedTax = new GuyanaValueAddedTax();
        $this->currency = new Currency('GYD');
    }

    /**
     * @return GuyanaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->guyanaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
