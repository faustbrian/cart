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
use BaseCodeOy\Basket\TaxRates\Europe\RussiaValueAddedTax;
use Money\Currency;

final readonly class Russia implements Jurisdiction
{
    private Currency $currency;

    private RussiaValueAddedTax $russiaValueAddedTax;

    /**
     * Russia constructor.
     */
    public function __construct()
    {
        $this->russiaValueAddedTax = new RussiaValueAddedTax();
        $this->currency = new Currency('RUB');
    }

    /**
     * @return RussiaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->russiaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
