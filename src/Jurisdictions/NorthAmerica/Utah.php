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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\UtahValueAddedTax;
use Money\Currency;

final readonly class Utah implements Jurisdiction
{
    private Currency $currency;

    private UtahValueAddedTax $utahValueAddedTax;

    /**
     * Utah constructor.
     */
    public function __construct()
    {
        $this->utahValueAddedTax = new UtahValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return UtahValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->utahValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
