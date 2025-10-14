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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\WestVirginiaValueAddedTax;
use Money\Currency;

final readonly class WestVirginia implements Jurisdiction
{
    private Currency $currency;

    private WestVirginiaValueAddedTax $westVirginiaValueAddedTax;

    /**
     * WestVirginia constructor.
     */
    public function __construct()
    {
        $this->westVirginiaValueAddedTax = new WestVirginiaValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return WestVirginiaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->westVirginiaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
