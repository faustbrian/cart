<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Jurisdictions\NorthAmerica;

use BaseCodeOy\Basket\Contracts\Jurisdiction;
use BaseCodeOy\Basket\Contracts\TaxRate;
use BaseCodeOy\Basket\TaxRates\NorthAmerica\TexasValueAddedTax;
use Money\Currency;

final readonly class Texas implements Jurisdiction
{
    private Currency $currency;

    private TexasValueAddedTax $texasValueAddedTax;

    /**
     * Texas constructor.
     */
    public function __construct()
    {
        $this->texasValueAddedTax = new TexasValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return TexasValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->texasValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
