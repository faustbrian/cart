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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\WyomingValueAddedTax;
use Money\Currency;

final readonly class Wyoming implements Jurisdiction
{
    private Currency $currency;

    private WyomingValueAddedTax $wyomingValueAddedTax;

    /**
     * Wyoming constructor.
     */
    public function __construct()
    {
        $this->wyomingValueAddedTax = new WyomingValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return WyomingValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->wyomingValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
