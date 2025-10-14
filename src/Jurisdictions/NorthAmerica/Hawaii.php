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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\HawaiiValueAddedTax;
use Money\Currency;

final readonly class Hawaii implements Jurisdiction
{
    private Currency $currency;

    private HawaiiValueAddedTax $hawaiiValueAddedTax;

    /**
     * Hawaii constructor.
     */
    public function __construct()
    {
        $this->hawaiiValueAddedTax = new HawaiiValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return HawaiiValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->hawaiiValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
