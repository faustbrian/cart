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
use BaseCodeOy\Basket\TaxRates\Europe\DenmarkValueAddedTax;
use Money\Currency;

final readonly class Denmark implements Jurisdiction
{
    private Currency $currency;

    private DenmarkValueAddedTax $denmarkValueAddedTax;

    /**
     * Denmark constructor.
     */
    public function __construct()
    {
        $this->denmarkValueAddedTax = new DenmarkValueAddedTax();
        $this->currency = new Currency('DKK');
    }

    /**
     * @return DenmarkValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->denmarkValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
