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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\MarylandValueAddedTax;
use Money\Currency;

final readonly class Maryland implements Jurisdiction
{
    private Currency $currency;

    private MarylandValueAddedTax $marylandValueAddedTax;

    /**
     * Maryland constructor.
     */
    public function __construct()
    {
        $this->marylandValueAddedTax = new MarylandValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return MarylandValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->marylandValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
