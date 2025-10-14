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
use BaseCodeOy\Basket\TaxRates\Europe\RomaniaValueAddedTax;
use Money\Currency;

final readonly class Romania implements Jurisdiction
{
    private Currency $currency;

    private RomaniaValueAddedTax $romaniaValueAddedTax;

    /**
     * Romania constructor.
     */
    public function __construct()
    {
        $this->romaniaValueAddedTax = new RomaniaValueAddedTax();
        $this->currency = new Currency('RON');
    }

    /**
     * @return RomaniaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->romaniaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
