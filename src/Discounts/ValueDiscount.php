<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Discounts;

use BaseCodeOy\Basket\Contracts\Discount;
use BaseCodeOy\Basket\Contracts\Money as MoneyInterface;
use BaseCodeOy\Basket\Product;
use Money\Money;

final readonly class ValueDiscount implements Discount, MoneyInterface
{
    /**
     * ValueDiscount constructor.
     */
    public function __construct(
        /** @var Money */
        private Money $money,
    ) {}

    #[\Override()]
    public function product(Product $product): Money
    {
        return $this->money;
    }

    #[\Override()]
    public function rate(): Money
    {
        return $this->money;
    }

    #[\Override()]
    public function toMoney(): Money
    {
        return $this->money;
    }
}
