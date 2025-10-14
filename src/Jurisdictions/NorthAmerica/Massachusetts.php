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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\MassachusettsValueAddedTax;
use Money\Currency;

final readonly class Massachusetts implements Jurisdiction
{
    private Currency $currency;

    private MassachusettsValueAddedTax $massachusettsValueAddedTax;

    /**
     * Massachusetts constructor.
     */
    public function __construct()
    {
        $this->massachusettsValueAddedTax = new MassachusettsValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return MassachusettsValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->massachusettsValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
