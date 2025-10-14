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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\IdahoValueAddedTax;
use Money\Currency;

final readonly class Idaho implements Jurisdiction
{
    private Currency $currency;

    private IdahoValueAddedTax $idahoValueAddedTax;

    /**
     * Idaho constructor.
     */
    public function __construct()
    {
        $this->idahoValueAddedTax = new IdahoValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return IdahoValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->idahoValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
