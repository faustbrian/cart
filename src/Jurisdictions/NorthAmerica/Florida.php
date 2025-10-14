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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\FloridaValueAddedTax;
use Money\Currency;

final readonly class Florida implements Jurisdiction
{
    private Currency $currency;

    private FloridaValueAddedTax $floridaValueAddedTax;

    /**
     * Florida constructor.
     */
    public function __construct()
    {
        $this->floridaValueAddedTax = new FloridaValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return FloridaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->floridaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
