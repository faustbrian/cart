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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\SouthCarolinaValueAddedTax;
use Money\Currency;

final readonly class SouthCarolina implements Jurisdiction
{
    private Currency $currency;

    private SouthCarolinaValueAddedTax $southCarolinaValueAddedTax;

    /**
     * SouthCarolina constructor.
     */
    public function __construct()
    {
        $this->southCarolinaValueAddedTax = new SouthCarolinaValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return SouthCarolinaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->southCarolinaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
