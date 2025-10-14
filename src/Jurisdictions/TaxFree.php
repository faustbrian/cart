<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Jurisdictions;

use BaseCodeOy\Basket\Contracts\Jurisdiction;
use BaseCodeOy\Basket\TaxRates\TaxFreeValueAddedTax;
use Money\Currency;

final readonly class TaxFree implements Jurisdiction
{
    private Currency $currency;

    private TaxFreeValueAddedTax $taxFreeValueAddedTax;

    /**
     * UnitedKingdom constructor.
     */
    public function __construct()
    {
        $this->taxFreeValueAddedTax = new TaxFreeValueAddedTax();
        $this->currency = new Currency('USD');
    }

    #[\Override()]
    public function rate(): TaxFreeValueAddedTax
    {
        return $this->taxFreeValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
