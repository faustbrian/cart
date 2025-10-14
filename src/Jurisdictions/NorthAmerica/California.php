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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\CaliforniaValueAddedTax;
use Money\Currency;

final readonly class California implements Jurisdiction
{
    private Currency $currency;

    private CaliforniaValueAddedTax $californiaValueAddedTax;

    /**
     * California constructor.
     */
    public function __construct()
    {
        $this->californiaValueAddedTax = new CaliforniaValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return CaliforniaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->californiaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
