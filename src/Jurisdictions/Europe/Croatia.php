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
use BaseCodeOy\Basket\TaxRates\Europe\CroatiaValueAddedTax;
use Money\Currency;

final readonly class Croatia implements Jurisdiction
{
    private Currency $currency;

    private CroatiaValueAddedTax $croatiaValueAddedTax;

    /**
     * Croatia constructor.
     */
    public function __construct()
    {
        $this->croatiaValueAddedTax = new CroatiaValueAddedTax();
        $this->currency = new Currency('HRK');
    }

    /**
     * @return CroatiaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->croatiaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
