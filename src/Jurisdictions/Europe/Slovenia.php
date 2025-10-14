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
use BaseCodeOy\Basket\TaxRates\Europe\SloveniaValueAddedTax;
use Money\Currency;

final readonly class Slovenia implements Jurisdiction
{
    private Currency $currency;

    private SloveniaValueAddedTax $sloveniaValueAddedTax;

    /**
     * Slovenia constructor.
     */
    public function __construct()
    {
        $this->sloveniaValueAddedTax = new SloveniaValueAddedTax();
        $this->currency = new Currency('EUR');
    }

    /**
     * @return SloveniaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->sloveniaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
