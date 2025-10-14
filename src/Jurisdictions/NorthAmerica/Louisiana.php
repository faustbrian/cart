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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\LouisianaValueAddedTax;
use Money\Currency;

final readonly class Louisiana implements Jurisdiction
{
    private Currency $currency;

    private LouisianaValueAddedTax $louisianaValueAddedTax;

    /**
     * Louisiana constructor.
     */
    public function __construct()
    {
        $this->louisianaValueAddedTax = new LouisianaValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return LouisianaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->louisianaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
