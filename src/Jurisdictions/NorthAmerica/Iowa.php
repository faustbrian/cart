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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\IowaValueAddedTax;
use Money\Currency;

final readonly class Iowa implements Jurisdiction
{
    private Currency $currency;

    private IowaValueAddedTax $iowaValueAddedTax;

    /**
     * Iowa constructor.
     */
    public function __construct()
    {
        $this->iowaValueAddedTax = new IowaValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return IowaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->iowaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
