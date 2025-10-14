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
use BaseCodeOy\Basket\TaxRates\Europe\SwitzerlandValueAddedTax;
use Money\Currency;

final readonly class Switzerland implements Jurisdiction
{
    private Currency $currency;

    private SwitzerlandValueAddedTax $switzerlandValueAddedTax;

    /**
     * Switzerland constructor.
     */
    public function __construct()
    {
        $this->switzerlandValueAddedTax = new SwitzerlandValueAddedTax();
        $this->currency = new Currency('CHF');
    }

    /**
     * @return SwitzerlandValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->switzerlandValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
