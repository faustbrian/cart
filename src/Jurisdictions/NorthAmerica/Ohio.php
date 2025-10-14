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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\OhioValueAddedTax;
use Money\Currency;

final readonly class Ohio implements Jurisdiction
{
    private Currency $currency;

    private OhioValueAddedTax $ohioValueAddedTax;

    /**
     * Ohio constructor.
     */
    public function __construct()
    {
        $this->ohioValueAddedTax = new OhioValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return OhioValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->ohioValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
