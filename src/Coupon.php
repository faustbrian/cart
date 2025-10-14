<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket;

final readonly class Coupon
{
    private Collection $collection;

    /**
     * Coupon constructor.
     */
    public function __construct(
        private mixed $identifier,
    ) {
        $this->collection = new Collection();
    }

    /**
     * @return mixed
     */
    public function identifier()
    {
        return $this->identifier;
    }

    public function discounts(): Collection
    {
        return $this->collection;
    }

    public function count(): int
    {
        return $this->collection->count();
    }

    /**
     * @return mixed
     */
    public function pick(mixed $index)
    {
        return $this->collection->get($index);
    }

    public function add($discount): void
    {
        $this->collection->push($discount);
    }

    public function remove($index): void
    {
        $this->collection->remove($index);
    }

    public function serialize(): string
    {
        return \serialize($this);
    }
}
