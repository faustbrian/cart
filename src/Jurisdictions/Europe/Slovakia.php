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
use BaseCodeOy\Basket\TaxRates\Europe\SlovakiaValueAddedTax;
use Money\Currency;

final readonly class Slovakia implements Jurisdiction
{
    private Currency $currency;

    private SlovakiaValueAddedTax $slovakiaValueAddedTax;

    /**
     * Slovakia constructor.
     */
    public function __construct()
    {
        $this->slovakiaValueAddedTax = new SlovakiaValueAddedTax();
        $this->currency = new Currency('EUR');
    }

    /**
     * @return SlovakiaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->slovakiaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
