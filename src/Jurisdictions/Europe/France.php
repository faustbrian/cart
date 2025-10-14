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
use BaseCodeOy\Basket\TaxRates\Europe\FranceValueAddedTax;
use Money\Currency;

final readonly class France implements Jurisdiction
{
    private Currency $currency;

    private FranceValueAddedTax $franceValueAddedTax;

    /**
     * France constructor.
     */
    public function __construct()
    {
        $this->franceValueAddedTax = new FranceValueAddedTax();
        $this->currency = new Currency('EUR');
    }

    /**
     * @return FranceValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->franceValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
