<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\MetaData;

use BaseCodeOy\Basket\Basket;
use BaseCodeOy\Basket\Contracts\MetaData;

final class ProductsMetaData implements MetaData
{
    /**
     * @return int
     */
    #[\Override()]
    public function generate(Basket $basket): int|float
    {
        $total = 0;

        foreach ($basket->products() as $collection) {
            $total += $collection->quantity;
        }

        return $total;
    }

    #[\Override()]
    public function name(): string
    {
        return 'products_count';
    }
}
