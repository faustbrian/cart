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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\ColoradoValueAddedTax;
use Money\Currency;

final readonly class Colorado implements Jurisdiction
{
    private Currency $currency;

    private ColoradoValueAddedTax $coloradoValueAddedTax;

    /**
     * Colorado constructor.
     */
    public function __construct()
    {
        $this->coloradoValueAddedTax = new ColoradoValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return ColoradoValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->coloradoValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
