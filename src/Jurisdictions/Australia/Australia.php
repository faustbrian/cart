<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Jurisdictions\Australia;

use BaseCodeOy\Basket\Contracts\Jurisdiction;
use BaseCodeOy\Basket\Contracts\TaxRate;
use BaseCodeOy\Basket\TaxRates\Australia\AustraliaValueAddedTax;
use Money\Currency;

final readonly class Australia implements Jurisdiction
{
    private Currency $currency;

    private AustraliaValueAddedTax $australiaValueAddedTax;

    /**
     * Australia constructor.
     */
    public function __construct()
    {
        $this->australiaValueAddedTax = new AustraliaValueAddedTax();
        $this->currency = new Currency('AUD');
    }

    /**
     * @return AustraliaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->australiaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
