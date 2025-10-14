<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket;

use Money\Money;

final readonly class Order
{
    /**
     * Order constructor.
     */
    public function __construct(
        /** @var array */
        private array $meta,
        /** @var array */
        private array $products,
        /** @var Money */
        private ?Money $money,
    ) {}

    public function meta(): array
    {
        return $this->meta;
    }

    public function products(): array
    {
        return $this->products;
    }

    public function delivery(): ?Money
    {
        return $this->money;
    }

    public function toArray(): array
    {
        return \array_merge($this->meta, ['products' => $this->products]);
    }
}
