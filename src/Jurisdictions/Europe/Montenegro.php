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
use BaseCodeOy\Basket\TaxRates\Europe\MontenegroValueAddedTax;
use Money\Currency;

final readonly class Montenegro implements Jurisdiction
{
    private Currency $currency;

    private MontenegroValueAddedTax $montenegroValueAddedTax;

    /**
     * Montenegro constructor.
     */
    public function __construct()
    {
        $this->montenegroValueAddedTax = new MontenegroValueAddedTax();
        $this->currency = new Currency('EUR');
    }

    /**
     * @return MontenegroValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->montenegroValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
