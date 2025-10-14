<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket;

use BaseCodeOy\Basket\Contracts\Category;
use BaseCodeOy\Basket\Contracts\Discount;
use BaseCodeOy\Basket\Contracts\TaxRate;
use Money\Money;

final class Product
{
    private int $quantity = 1;

    private bool $freebie = false;

    private bool $taxable = true;

    private Money $delivery;

    private ?Category $category = null;

    private readonly Collection $coupons;

    private readonly Collection $tags;

    private readonly Collection $discounts;

    private readonly Collection $attributes;

    /**
     * Product constructor.
     */
    public function __construct(
        private readonly mixed $sku,
        private readonly mixed $name,
        /** @var Money */
        private readonly Money $money,
        /** @var TaxRate */
        private TaxRate $taxRate,
    ) {
        $this->delivery = new Money(0, $money->getCurrency());
        $this->coupons = new Collection();
        $this->tags = new Collection();
        $this->discounts = new Collection();
        $this->attributes = new Collection();
    }

    /**
     * @return mixed
     */
    public function __get(mixed $key)
    {
        if (\property_exists($this, $key)) {
            return $this->{$key};
        }

        if ($this->attributes->has($key)) {
            return $this->attributes->get($key);
        }

        return null;
    }

    public function quantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function increment(): void
    {
        ++$this->quantity;
    }

    public function decrement(): void
    {
        --$this->quantity;
    }

    public function freebie(bool $status): void
    {
        $this->freebie = $status;
    }

    public function taxable(bool $status): void
    {
        $this->taxable = $status;
    }

    /**
     * Set the tax rate.
     *
     * @param int $taxRate
     */
    public function rate(TaxRate $taxRate): void
    {
        $this->taxRate = $taxRate;
    }

    public function delivery(Money $money): void
    {
        if ($this->money->isSameCurrency($money)) {
            $this->delivery = $money;
        }
    }

    public function coupon(Coupon $coupon): void
    {
        $this->coupons->push($coupon);
    }

    public function tags($tag): void
    {
        $this->tags->push($tag);
    }

    public function discount(Discount $discount): void
    {
        $this->discounts->add(0, $discount);
    }

    /**
     * Add an attribute.
     *
     * @param string $key
     */
    public function attributes($key, mixed $value): void
    {
        $this->attributes->add($key, $value);
    }

    public function category(Category $category): void
    {
        $this->category = $category;

        $this->category->categorise($this);
    }

    public function action(\Closure $actions): void
    {
        $actions($this);
    }
}
