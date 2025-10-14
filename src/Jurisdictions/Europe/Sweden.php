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
use BaseCodeOy\Basket\TaxRates\Europe\SwedenValueAddedTax;
use Money\Currency;

final readonly class Sweden implements Jurisdiction
{
    private Currency $currency;

    private SwedenValueAddedTax $swedenValueAddedTax;

    /**
     * Sweden constructor.
     */
    public function __construct()
    {
        $this->swedenValueAddedTax = new SwedenValueAddedTax();
        $this->currency = new Currency('SEK');
    }

    /**
     * @return SwedenValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->swedenValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
