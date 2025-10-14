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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\MaineValueAddedTax;
use Money\Currency;

final readonly class Maine implements Jurisdiction
{
    private Currency $currency;

    private MaineValueAddedTax $maineValueAddedTax;

    /**
     * Maine constructor.
     */
    public function __construct()
    {
        $this->maineValueAddedTax = new MaineValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return MaineValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->maineValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
