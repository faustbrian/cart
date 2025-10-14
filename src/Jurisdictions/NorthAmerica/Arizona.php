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
use BaseCodeOy\Basket\TaxRates\NorthAmerica\ArizonaValueAddedTax;
use Money\Currency;

final readonly class Arizona implements Jurisdiction
{
    private Currency $currency;

    private ArizonaValueAddedTax $ArizonaValueAddedTax;

    /**
     * Arizona constructor.
     */
    public function __construct()
    {
        $this->ArizonaValueAddedTax = new ArizonaValueAddedTax();
        $this->currency = new Currency('USD');
    }

    /**
     * @return ArizonaValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->ArizonaValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
