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
use BaseCodeOy\Basket\TaxRates\Europe\MaltaValueAddedTax;
use Money\Currency;

final readonly class Malta implements Jurisdiction
{
    private Currency $currency;

    private MaltaValueAddedTax $maltaValueAddedTax;

    /**
     * Malta constructor.
     */
    public function __construct()
    {
        $this->maltaValueAddedTax = new MaltaValueAddedTax();
        $this->currency = new Currency('EUR');
    }

    /**
     * @return MaltaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->maltaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
