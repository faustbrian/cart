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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\WisconsinValueAddedTax;
use Money\Currency;

final readonly class Wisconsin implements Jurisdiction
{
    private Currency $currency;

    private WisconsinValueAddedTax $wisconsinValueAddedTax;

    /**
     * Wisconsin constructor.
     */
    public function __construct()
    {
        $this->wisconsinValueAddedTax = new WisconsinValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return WisconsinValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->wisconsinValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
