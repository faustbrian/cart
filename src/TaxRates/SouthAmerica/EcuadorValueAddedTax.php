<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\TaxRates\SouthAmerica;

use BaseCodeOy\Basket\Contracts\TaxRate;

final class EcuadorValueAddedTax implements TaxRate
{
    private float $rate = 0.12;

    #[\Override()]
    public function float(): float
    {
        return $this->rate;
    }

    #[\Override()]
    public function percentage(): int
    {
        return (int) ($this->rate * 100);
    }
}
