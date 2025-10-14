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
use BaseCodeOy\Basket\TaxRates\Europe\TurkeyValueAddedTax;
use Money\Currency;

final readonly class Turkey implements Jurisdiction
{
    private Currency $currency;

    private TurkeyValueAddedTax $turkeyValueAddedTax;

    /**
     * Turkey constructor.
     */
    public function __construct()
    {
        $this->turkeyValueAddedTax = new TurkeyValueAddedTax();
        $this->currency = new Currency('TRY');
    }

    /**
     * @return TurkeyValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->turkeyValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
