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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\MissouriValueAddedTax;
use Money\Currency;

final readonly class Missouri implements Jurisdiction
{
    private Currency $currency;

    private MissouriValueAddedTax $missouriValueAddedTax;

    /**
     * Missouri constructor.
     */
    public function __construct()
    {
        $this->missouriValueAddedTax = new MissouriValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return MissouriValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->missouriValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
