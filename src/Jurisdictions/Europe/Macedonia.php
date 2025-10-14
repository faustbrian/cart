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
use BaseCodeOy\Basket\TaxRates\Europe\MacedoniaValueAddedTax;
use Money\Currency;

final readonly class Macedonia implements Jurisdiction
{
    private Currency $currency;

    private MacedoniaValueAddedTax $macedoniaValueAddedTax;

    /**
     * Macedonia constructor.
     */
    public function __construct()
    {
        $this->macedoniaValueAddedTax = new MacedoniaValueAddedTax();
        $this->currency = new Currency('MKD');
    }

    /**
     * @return MacedoniaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->macedoniaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
