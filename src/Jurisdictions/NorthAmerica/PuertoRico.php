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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\PuertoRicoValueAddedTax;
use Money\Currency;

final readonly class PuertoRico implements Jurisdiction
{
    private Currency $currency;

    private PuertoRicoValueAddedTax $puertoRicoValueAddedTax;

    /**
     * PuertoRico constructor.
     */
    public function __construct()
    {
        $this->puertoRicoValueAddedTax = new PuertoRicoValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return PuertoRicoValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->puertoRicoValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
