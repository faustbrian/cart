<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Formatters;

use BaseCodeOy\Basket\Contracts\Formatter;
use BaseCodeOy\Basket\Discounts\PercentageDiscount;
use BaseCodeOy\Basket\Discounts\ValueDiscount;
use Carbon\Exceptions\InvalidTypeException;

final class QuantityFormatter implements Formatter
{
    #[\Override()]
    public function format($value): string
    {
        $value = $value->rate();

        if ($value instanceof PercentageDiscount) {
            return (new PercentFormatter($value))->format($value);
        }

        if ($value instanceof ValueDiscount) {
            return (new MoneyFormatter())->format($value);
        }

        throw new InvalidTypeException('Invalid discount type');
    }
}
