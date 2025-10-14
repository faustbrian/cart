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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\NevadaValueAddedTax;
use Money\Currency;

final readonly class Nevada implements Jurisdiction
{
    private Currency $currency;

    private NevadaValueAddedTax $nevadaValueAddedTax;

    /**
     * Nevada constructor.
     */
    public function __construct()
    {
        $this->nevadaValueAddedTax = new NevadaValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return NevadaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->nevadaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
