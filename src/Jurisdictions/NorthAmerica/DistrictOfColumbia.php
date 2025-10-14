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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\DistrictOfColumbiaValueAddedTax;
use Money\Currency;

final readonly class DistrictOfColumbia implements Jurisdiction
{
    private Currency $currency;

    private DistrictOfColumbiaValueAddedTax $districtOfColumbiaValueAddedTax;

    /**
     * DistrictOfColumbia constructor.
     */
    public function __construct()
    {
        $this->districtOfColumbiaValueAddedTax = new DistrictOfColumbiaValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return DistrictOfColumbiaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->districtOfColumbiaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
