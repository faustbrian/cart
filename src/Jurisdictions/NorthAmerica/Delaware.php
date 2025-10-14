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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\DelawareValueAddedTax;
use Money\Currency;

final readonly class Delaware implements Jurisdiction
{
    private Currency $currency;

    private DelawareValueAddedTax $delawareValueAddedTax;

    /**
     * Delaware constructor.
     */
    public function __construct()
    {
        $this->delawareValueAddedTax = new DelawareValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return DelawareValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->delawareValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
