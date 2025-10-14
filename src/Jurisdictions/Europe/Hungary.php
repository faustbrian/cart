<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Jurisdictions\Europe;

use BaseCodeOy\Basket\Contracts\Jurisdiction;
use BaseCodeOy\Basket\Contracts\TaxRate;
use BaseCodeOy\Basket\TaxRates\Europe\HungaryValueAddedTax;
use Money\Currency;

final readonly class Hungary implements Jurisdiction
{
    private Currency $currency;

    private HungaryValueAddedTax $hungaryValueAddedTax;

    /**
     * Hungary constructor.
     */
    public function __construct()
    {
        $this->hungaryValueAddedTax = new HungaryValueAddedTax();
        $this->currency = new Currency('HUF');
    }

    /**
     * @return HungaryValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->hungaryValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
