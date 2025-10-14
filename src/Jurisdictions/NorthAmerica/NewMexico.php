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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\NewMexicoValueAddedTax;
use Money\Currency;

final readonly class NewMexico implements Jurisdiction
{
    private Currency $currency;

    private NewMexicoValueAddedTax $newMexicoValueAddedTax;

    /**
     * NewMexico constructor.
     */
    public function __construct()
    {
        $this->newMexicoValueAddedTax = new NewMexicoValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return NewMexicoValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->newMexicoValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
