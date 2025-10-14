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
use BaseCodeOy\Basket\TaxRates\Europe\UnitedKingdomValueAddedTax;
use Money\Currency;

final readonly class UnitedKingdom implements Jurisdiction
{
    private Currency $currency;

    private UnitedKingdomValueAddedTax $unitedKingdomValueAddedTax;

    /**
     * UnitedKingdom constructor.
     */
    public function __construct()
    {
        $this->unitedKingdomValueAddedTax = new UnitedKingdomValueAddedTax();
        $this->currency = new Currency('GBP');
    }

    /**
     * @return UnitedKingdomValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->unitedKingdomValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
