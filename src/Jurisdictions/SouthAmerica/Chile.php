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
use BaseCodeOy\Basket\TaxRates\SouthAmerica\ChileValueAddedTax;
use Money\Currency;

final readonly class Chile implements Jurisdiction
{
    private Currency $currency;

    private ChileValueAddedTax $chileValueAddedTax;

    /**
     * Chile constructor.
     */
    public function __construct()
    {
        $this->chileValueAddedTax = new ChileValueAddedTax();
        $this->currency = new Currency('CLP');
    }

    /**
     * @return ChileValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->chileValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
