<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Jurisdictions\SouthAmerica;

use BaseCodeOy\Basket\Contracts\Jurisdiction;
use BaseCodeOy\Basket\Contracts\TaxRate;
use BaseCodeOy\Basket\TaxRates\SouthAmerica\EcuadorValueAddedTax;
use Money\Currency;

final readonly class Ecuador implements Jurisdiction
{
    private Currency $currency;

    private EcuadorValueAddedTax $ecuadorValueAddedTax;

    /**
     * Ecuador constructor.
     */
    public function __construct()
    {
        $this->ecuadorValueAddedTax = new EcuadorValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return EcuadorValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->ecuadorValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
