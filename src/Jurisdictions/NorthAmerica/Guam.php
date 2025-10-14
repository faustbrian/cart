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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\GuamValueAddedTax;
use Money\Currency;

final readonly class Guam implements Jurisdiction
{
    private Currency $currency;

    private GuamValueAddedTax $guamValueAddedTax;

    /**
     * Guam constructor.
     */
    public function __construct()
    {
        $this->guamValueAddedTax = new GuamValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return GuamValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->guamValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
