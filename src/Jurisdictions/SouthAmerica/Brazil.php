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
use BaseCodeOy\Basket\TaxRates\SouthAmerica\BrazilValueAddedTax;
use Money\Currency;

final readonly class Brazil implements Jurisdiction
{
    private Currency $currency;

    private BrazilValueAddedTax $brazilValueAddedTax;

    /**
     * Brazil constructor.
     */
    public function __construct()
    {
        $this->brazilValueAddedTax = new BrazilValueAddedTax();
        $this->currency = new Currency('BRL');
    }

    /**
     * @return BrazilValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->brazilValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
