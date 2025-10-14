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
use BaseCodeOy\Basket\TaxRates\Europe\FinlandValueAddedTax;
use Money\Currency;

final readonly class Finland implements Jurisdiction
{
    private Currency $currency;

    private FinlandValueAddedTax $finlandValueAddedTax;

    /**
     * Finland constructor.
     */
    public function __construct()
    {
        $this->finlandValueAddedTax = new FinlandValueAddedTax();
        $this->currency = new Currency('EUR');
    }

    /**
     * @return FinlandValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->finlandValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
