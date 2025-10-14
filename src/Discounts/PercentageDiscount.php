<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Discounts;

use BaseCodeOy\Basket\Contracts\Discount;
use BaseCodeOy\Basket\Contracts\Percentage;
use BaseCodeOy\Basket\Percent;
use BaseCodeOy\Basket\Product;
use Money\Money;

final readonly class PercentageDiscount implements Discount, Percentage
{
    /**
     * PercentageDiscount constructor.
     */
    public function __construct(
        private mixed $rate,
    ) {}

    #[\Override()]
    public function product(Product $product): Money
    {
        return $product->price->multiply($this->rate / 100);
    }

    #[\Override()]
    public function rate(): Percent
    {
        return new Percent($this->rate);
    }

    #[\Override()]
    public function toPercent(): Percent
    {
        return new Percent($this->rate);
    }
}
