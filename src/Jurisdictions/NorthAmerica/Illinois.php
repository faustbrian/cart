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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\IllinoisValueAddedTax;
use Money\Currency;

final readonly class Illinois implements Jurisdiction
{
    private Currency $currency;

    private IllinoisValueAddedTax $illinoisValueAddedTax;

    /**
     * Illinois constructor.
     */
    public function __construct()
    {
        $this->illinoisValueAddedTax = new IllinoisValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return IllinoisValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->illinoisValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
