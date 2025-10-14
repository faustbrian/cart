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
use BaseCodeOy\Basket\TaxRates\SouthAmerica\ArgentinaValueAddedTax;
use Money\Currency;

final readonly class Argentina implements Jurisdiction
{
    private Currency $currency;

    private ArgentinaValueAddedTax $argentinaValueAddedTax;

    /**
     * Argentina constructor.
     */
    public function __construct()
    {
        $this->argentinaValueAddedTax = new ArgentinaValueAddedTax();
        $this->currency = new Currency('ARS');
    }

    /**
     * @return ArgentinaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->argentinaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
