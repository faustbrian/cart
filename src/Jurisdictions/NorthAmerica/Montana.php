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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\MontanaValueAddedTax;
use Money\Currency;

final readonly class Montana implements Jurisdiction
{
    private Currency $currency;

    private MontanaValueAddedTax $montanaValueAddedTax;

    /**
     * Montana constructor.
     */
    public function __construct()
    {
        $this->montanaValueAddedTax = new MontanaValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return MontanaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->montanaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
