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
use BaseCodeOy\Basket\TaxRates\Europe\PolandValueAddedTax;
use Money\Currency;

final readonly class Poland implements Jurisdiction
{
    private Currency $currency;

    private PolandValueAddedTax $polandValueAddedTax;

    /**
     * Poland constructor.
     */
    public function __construct()
    {
        $this->polandValueAddedTax = new PolandValueAddedTax();
        $this->currency = new Currency('PLN');
    }

    /**
     * @return PolandValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->polandValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
