<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\TaxRates;

use BaseCodeOy\Basket\Contracts\TaxRate;

final class TaxFreeValueAddedTax implements TaxRate
{
    private int $rate = 0;

    #[\Override()]
    public function float(): int
    {
        return $this->rate;
    }

    #[\Override()]
    public function percentage(): int
    {
        return $this->rate * 100;
    }
}
