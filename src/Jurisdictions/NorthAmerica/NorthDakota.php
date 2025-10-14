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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\NorthDakotaValueAddedTax;
use Money\Currency;

final readonly class NorthDakota implements Jurisdiction
{
    private Currency $currency;

    private NorthDakotaValueAddedTax $northDakotaValueAddedTax;

    /**
     * NorthDakota constructor.
     */
    public function __construct()
    {
        $this->northDakotaValueAddedTax = new NorthDakotaValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return NorthDakotaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->northDakotaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
