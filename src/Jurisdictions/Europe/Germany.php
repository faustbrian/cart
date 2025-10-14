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
use BaseCodeOy\Basket\TaxRates\Europe\GermanyValueAddedTax;
use Money\Currency;

final readonly class Germany implements Jurisdiction
{
    private Currency $currency;

    private GermanyValueAddedTax $germanyValueAddedTax;

    /**
     * Germany constructor.
     */
    public function __construct()
    {
        $this->germanyValueAddedTax = new GermanyValueAddedTax();
        $this->currency = new Currency('EUR');
    }

    /**
     * @return GermanyValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->germanyValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
