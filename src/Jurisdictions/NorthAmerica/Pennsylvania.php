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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\PennsylvaniaValueAddedTax;
use Money\Currency;

final readonly class Pennsylvania implements Jurisdiction
{
    private Currency $currency;

    private PennsylvaniaValueAddedTax $pennsylvaniaValueAddedTax;

    /**
     * Pennsylvania constructor.
     */
    public function __construct()
    {
        $this->pennsylvaniaValueAddedTax = new PennsylvaniaValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return PennsylvaniaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->pennsylvaniaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
