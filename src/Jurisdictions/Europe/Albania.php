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
use BaseCodeOy\Basket\TaxRates\Europe\AlbaniaValueAddedTax;
use Money\Currency;

final readonly class Albania implements Jurisdiction
{
    private Currency $currency;

    private AlbaniaValueAddedTax $albaniaValueAddedTax;

    /**
     * Albania constructor.
     */
    public function __construct()
    {
        $this->albaniaValueAddedTax = new AlbaniaValueAddedTax();
        $this->currency = new Currency('ALL');
    }

    /**
     * @return AlbaniaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->albaniaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
