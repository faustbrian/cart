<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Discounts;

use BaseCodeOy\Basket\Contracts\Discount;
use BaseCodeOy\Basket\Product;
use Money\Money;

final readonly class QuantityDiscount implements Discount
{
    /**
     * QuantityDiscount constructor.
     */
    public function __construct(
        private mixed $quantity,
        /** @var Discount */
        private Discount $discount,
    ) {}

    #[\Override()]
    public function product(Product $product): Money
    {
        if ($product->quantity >= $this->quantity) {
            return $this->discount->product($product);
        }

        return new Money(0, $product->price->getCurrency());
    }

    #[\Override()]
    public function rate(): Discount
    {
        return $this->discount;
    }
}
