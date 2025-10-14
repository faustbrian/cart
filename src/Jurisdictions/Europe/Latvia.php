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
use BaseCodeOy\Basket\TaxRates\Europe\LatviaValueAddedTax;
use Money\Currency;

final readonly class Latvia implements Jurisdiction
{
    private Currency $currency;

    private LatviaValueAddedTax $latviaValueAddedTax;

    /**
     * Latvia constructor.
     */
    public function __construct()
    {
        $this->latviaValueAddedTax = new LatviaValueAddedTax();
        $this->currency = new Currency('EUR');
    }

    /**
     * @return LatviaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->latviaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
