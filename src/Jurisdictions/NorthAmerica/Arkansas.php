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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\ArkansasValueAddedTax;
use Money\Currency;

final readonly class Arkansas implements Jurisdiction
{
    private Currency $currency;

    private ArkansasValueAddedTax $arkansasValueAddedTax;

    /**
     * Arkansas constructor.
     */
    public function __construct()
    {
        $this->arkansasValueAddedTax = new ArkansasValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return ArkansasValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->arkansasValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
