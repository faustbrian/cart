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
use BaseCodeOy\Basket\TaxRates\Europe\BosniaHerzegovinaValueAddedTax;
use Money\Currency;

final readonly class BosniaHerzegovina implements Jurisdiction
{
    private Currency $currency;

    private BosniaHerzegovinaValueAddedTax $bosniaHerzegovinaValueAddedTax;

    /**
     * BosniaHerzegovina constructor.
     */
    public function __construct()
    {
        $this->bosniaHerzegovinaValueAddedTax = new BosniaHerzegovinaValueAddedTax();
        $this->currency = new Currency('BAM');
    }

    /**
     * @return BosniaHerzegovinaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->bosniaHerzegovinaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
