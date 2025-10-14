<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Formatters;

use BaseCodeOy\Basket\Contracts\Formatter;

final class CollectionFormatter implements Formatter
{
    /**
     * @param mixed $value
     */
    #[\Override()]
    public function format($value): array
    {
        return $value->toArray();
    }
}
