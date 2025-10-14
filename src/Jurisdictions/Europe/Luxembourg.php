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
use BaseCodeOy\Basket\TaxRates\Europe\LuxembourgValueAddedTax;
use Money\Currency;

final readonly class Luxembourg implements Jurisdiction
{
    private Currency $currency;

    private LuxembourgValueAddedTax $luxembourgValueAddedTax;

    /**
     * Luxembourg constructor.
     */
    public function __construct()
    {
        $this->luxembourgValueAddedTax = new LuxembourgValueAddedTax();
        $this->currency = new Currency('EUR');
    }

    /**
     * @return LuxembourgValueAddedTax
     */
    #[\Override()]
    public function rate(): TaxRate
    {
        return $this->luxembourgValueAddedTax;
    }

    #[\Override()]
    public function currency(): Currency
    {
        return $this->currency;
    }
}
