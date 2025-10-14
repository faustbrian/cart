<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Jurisdictions\Europe;

use BaseCodeOy\Basket\Contracts\Jurisdiction;
use BaseCodeOy\Basket\Contracts\TaxRate;
use BaseCodeOy\Basket\TaxRates\Europe\CzechRepublicValueAddedTax;
use Money\Currency;

final readonly class CzechRepublic implements Jurisdiction
{
    private Currency $currency;

    private CzechRepublicValueAddedTax $czechRepublicValueAddedTax;

    /**
     * CzechRepublic constructor.
     */
    public function __construct()
    {
        $this->czechRepublicValueAddedTax = new CzechRepublicValueAddedTax();
        $this->currency = new Currency('CZK');
    }

    /**
     * @return CzechRepublicValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->czechRepublicValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
