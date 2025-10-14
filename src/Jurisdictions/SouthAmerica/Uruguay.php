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
use BaseCodeOy\Basket\TaxRates\SouthAmerica\UruguayValueAddedTax;
use Money\Currency;

final readonly class Uruguay implements Jurisdiction
{
    private Currency $currency;

    private UruguayValueAddedTax $uruguayValueAddedTax;

    /**
     * Uruguay constructor.
     */
    public function __construct()
    {
        $this->uruguayValueAddedTax = new UruguayValueAddedTax();
        $this->currency = new Currency('UYU');
    }

    /**
     * @return UruguayValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->uruguayValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
