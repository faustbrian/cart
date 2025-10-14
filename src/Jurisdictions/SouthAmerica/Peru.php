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
use BaseCodeOy\Basket\TaxRates\SouthAmerica\PeruValueAddedTax;
use Money\Currency;

final readonly class Peru implements Jurisdiction
{
    private Currency $currency;

    private PeruValueAddedTax $peruValueAddedTax;

    /**
     * Peru constructor.
     */
    public function __construct()
    {
        $this->peruValueAddedTax = new PeruValueAddedTax();
        $this->currency = new Currency('PEN');
    }

    /**
     * @return PeruValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->peruValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
