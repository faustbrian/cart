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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\SouthDakotaValueAddedTax;
use Money\Currency;

final readonly class SouthDakota implements Jurisdiction
{
    private Currency $currency;

    private SouthDakotaValueAddedTax $southDakotaValueAddedTax;

    /**
     * SouthDakota constructor.
     */
    public function __construct()
    {
        $this->southDakotaValueAddedTax = new SouthDakotaValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return SouthDakotaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->southDakotaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
