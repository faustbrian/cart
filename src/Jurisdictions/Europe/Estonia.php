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
use BaseCodeOy\Basket\TaxRates\Europe\EstoniaValueAddedTax;
use Money\Currency;

final readonly class Estonia implements Jurisdiction
{
    private Currency $currency;

    private EstoniaValueAddedTax $estoniaValueAddedTax;

    /**
     * Estonia constructor.
     */
    public function __construct()
    {
        $this->estoniaValueAddedTax = new EstoniaValueAddedTax();
        $this->currency = new Currency('EUR');
    }

    /**
     * @return EstoniaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->estoniaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
