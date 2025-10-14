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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\AlaskaValueAddedTax;
use Money\Currency;

final readonly class Alaska implements Jurisdiction
{
    private Currency $currency;

    private AlaskaValueAddedTax $alaskaValueAddedTax;

    /**
     * Alaska constructor.
     */
    public function __construct()
    {
        $this->alaskaValueAddedTax = new AlaskaValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return AlaskaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->alaskaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
