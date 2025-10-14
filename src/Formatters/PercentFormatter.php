<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Formatters;

use BaseCodeOy\Basket\Contracts\Formatter;
use BaseCodeOy\Basket\Contracts\Percentage;

final class PercentFormatter implements Formatter
{
    #[\Override()]
    public function format($value): string
    {
        if ($value instanceof Percentage) {
            $value = $value->toPercent();
        }

        return $value->int().'%';
    }
}
