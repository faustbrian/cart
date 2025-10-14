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
use BaseCodeOy\Basket\TaxRates\Europe\IrelandValueAddedTax;
use Money\Currency;

final readonly class Ireland implements Jurisdiction
{
    private Currency $currency;

    private IrelandValueAddedTax $irelandValueAddedTax;

    /**
     * Ireland constructor.
     */
    public function __construct()
    {
        $this->irelandValueAddedTax = new IrelandValueAddedTax();
        $this->currency = new Currency('EUR');
    }

    /**
     * @return IrelandValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->irelandValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
