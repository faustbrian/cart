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
use BaseCodeOy\Basket\TaxRates\Europe\AustriaValueAddedTax;
use Money\Currency;

final readonly class Austria implements Jurisdiction
{
    private Currency $currency;

    private AustriaValueAddedTax $austriaValueAddedTax;

    /**
     * Austria constructor.
     */
    public function __construct()
    {
        $this->austriaValueAddedTax = new AustriaValueAddedTax();
        $this->currency = new Currency('EUR');
    }

    /**
     * @return AustriaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->austriaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
