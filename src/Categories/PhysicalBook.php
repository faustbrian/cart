<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Categories;

use BaseCodeOy\Basket\Contracts\Category;
use BaseCodeOy\Basket\Product;

final class PhysicalBook implements Category
{
    #[\Override()]
    public function categorise(Product $product): void
    {
        $product->taxable(false);
    }

    #[\Override()]
    public function name(): string
    {
        return 'Physical Book';
    }
}
