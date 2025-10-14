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
use BaseCodeOy\Basket\TaxRates\Europe\ItalyValueAddedTax;
use Money\Currency;

final readonly class Italy implements Jurisdiction
{
    private Currency $currency;

    private ItalyValueAddedTax $italyValueAddedTax;

    /**
     * Italy constructor.
     */
    public function __construct()
    {
        $this->italyValueAddedTax = new ItalyValueAddedTax();
        $this->currency = new Currency('EUR');
    }

    /**
     * @return ItalyValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->italyValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
