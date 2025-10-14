<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Jurisdictions\NorthAmerica;

use BaseCodeOy\Basket\Contracts\Jurisdiction;
use BaseCodeOy\Basket\Contracts\TaxRate;
use BaseCodeOy\Basket\TaxRates\NorthAmerica\TennesseeValueAddedTax;
use Money\Currency;

final readonly class Tennessee implements Jurisdiction
{
    private Currency $currency;

    private TennesseeValueAddedTax $tennesseeValueAddedTax;

    /**
     * Tennessee constructor.
     */
    public function __construct()
    {
        $this->tennesseeValueAddedTax = new TennesseeValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return TennesseeValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->tennesseeValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
