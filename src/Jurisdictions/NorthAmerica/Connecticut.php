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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\ConnecticutValueAddedTax;
use Money\Currency;

final readonly class Connecticut implements Jurisdiction
{
    private Currency $currency;

    private ConnecticutValueAddedTax $connecticutValueAddedTax;

    /**
     * Connecticut constructor.
     */
    public function __construct()
    {
        $this->connecticutValueAddedTax = new ConnecticutValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return ConnecticutValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->connecticutValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
