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
use BaseCodeOy\Basket\TaxRates\Europe\SpainValueAddedTax;
use Money\Currency;

final readonly class Spain implements Jurisdiction
{
    private Currency $currency;

    private SpainValueAddedTax $spainValueAddedTax;

    /**
     * Spain constructor.
     */
    public function __construct()
    {
        $this->spainValueAddedTax = new SpainValueAddedTax();
        $this->currency = new Currency('EUR');
    }

    /**
     * @return SpainValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->spainValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
