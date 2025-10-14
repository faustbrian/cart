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
use BaseCodeOy\Basket\TaxRates\Europe\LiechtensteinValueAddedTax;
use Money\Currency;

final readonly class Liechtenstein implements Jurisdiction
{
    private Currency $currency;

    private LiechtensteinValueAddedTax $liechtensteinValueAddedTax;

    /**
     * Liechtenstein constructor.
     */
    public function __construct()
    {
        $this->liechtensteinValueAddedTax = new LiechtensteinValueAddedTax();
        $this->currency = new Currency('CHF');
    }

    /**
     * @return LiechtensteinValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->liechtensteinValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
