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
use BaseCodeOy\Basket\TaxRates\Europe\GeorgiaValueAddedTax;
use Money\Currency;

final readonly class Georgia implements Jurisdiction
{
    private Currency $currency;

    private GeorgiaValueAddedTax $georgiaValueAddedTax;

    /**
     * Georgia constructor.
     */
    public function __construct()
    {
        $this->georgiaValueAddedTax = new GeorgiaValueAddedTax();
        $this->currency = new Currency('GEL');
    }

    /**
     * @return GeorgiaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->georgiaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
