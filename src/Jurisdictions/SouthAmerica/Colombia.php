<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Jurisdictions\SouthAmerica;

use BaseCodeOy\Basket\Contracts\Jurisdiction;
use BaseCodeOy\Basket\Contracts\TaxRate;
use BaseCodeOy\Basket\TaxRates\SouthAmerica\ColombiaValueAddedTax;
use Money\Currency;

final readonly class Colombia implements Jurisdiction
{
    private Currency $currency;

    private ColombiaValueAddedTax $colombiaValueAddedTax;

    /**
     * Colombia constructor.
     */
    public function __construct()
    {
        $this->colombiaValueAddedTax = new ColombiaValueAddedTax();
        $this->currency = new Currency('COP');
    }

    /**
     * @return ColombiaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->colombiaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
