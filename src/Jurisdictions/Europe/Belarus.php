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
use BaseCodeOy\Basket\TaxRates\Europe\BelarusValueAddedTax;
use Money\Currency;

final readonly class Belarus implements Jurisdiction
{
    private Currency $currency;

    private BelarusValueAddedTax $belarusValueAddedTax;

    /**
     * Belarus constructor.
     */
    public function __construct()
    {
        $this->belarusValueAddedTax = new BelarusValueAddedTax();
        $this->currency = new Currency('BYR');
    }

    /**
     * @return BelarusValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->belarusValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
