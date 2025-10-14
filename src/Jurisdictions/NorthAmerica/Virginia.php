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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\VirginiaValueAddedTax;
use Money\Currency;

final readonly class Virginia implements Jurisdiction
{
    private Currency $currency;

    private VirginiaValueAddedTax $virginiaValueAddedTax;

    /**
     * Virginia constructor.
     */
    public function __construct()
    {
        $this->virginiaValueAddedTax = new VirginiaValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return VirginiaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->virginiaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
