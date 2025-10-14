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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\OklahomaValueAddedTax;
use Money\Currency;

final readonly class Oklahoma implements Jurisdiction
{
    private Currency $currency;

    private OklahomaValueAddedTax $oklahomaValueAddedTax;

    /**
     * Oklahoma constructor.
     */
    public function __construct()
    {
        $this->oklahomaValueAddedTax = new OklahomaValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return OklahomaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->oklahomaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
