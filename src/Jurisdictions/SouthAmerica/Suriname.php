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
use BaseCodeOy\Basket\TaxRates\SouthAmerica\SurinameValueAddedTax;
use Money\Currency;

final readonly class Suriname implements Jurisdiction
{
    private Currency $currency;

    private SurinameValueAddedTax $surinameValueAddedTax;

    /**
     * Suriname constructor.
     */
    public function __construct()
    {
        $this->surinameValueAddedTax = new SurinameValueAddedTax();
        $this->currency = new Currency('SRD');
    }

    /**
     * @return SurinameValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->surinameValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
