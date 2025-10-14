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
use BaseCodeOy\Basket\TaxRates\Europe\BelgiumValueAddedTax;
use Money\Currency;

final readonly class Belgium implements Jurisdiction
{
    private Currency $currency;

    private BelgiumValueAddedTax $belgiumValueAddedTax;

    /**
     * Belgium constructor.
     */
    public function __construct()
    {
        $this->belgiumValueAddedTax = new BelgiumValueAddedTax();
        $this->currency = new Currency('EUR');
    }

    /**
     * @return BelgiumValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->belgiumValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
