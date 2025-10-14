<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Jurisdictions\Europe;

use BaseCodeOy\Basket\Contracts\Jurisdiction;
use BaseCodeOy\Basket\Contracts\TaxRate;
use BaseCodeOy\Basket\TaxRates\Europe\UkraineValueAddedTax;
use Money\Currency;

final readonly class Ukraine implements Jurisdiction
{
    private Currency $currency;

    private UkraineValueAddedTax $ukraineValueAddedTax;

    /**
     * Ukraine constructor.
     */
    public function __construct()
    {
        $this->ukraineValueAddedTax = new UkraineValueAddedTax();
        $this->currency = new Currency('UAH');
    }

    /**
     * @return UkraineValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->ukraineValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
