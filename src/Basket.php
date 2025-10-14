<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket;

use BaseCodeOy\Basket\Contracts\Discount;
use BaseCodeOy\Basket\Contracts\Jurisdiction;
use Money\Currency;
use Money\Money;

final class Basket
{
    private $rate;

    private $currency;

    private ?Discount $discount = null;

    private ?Money $delivery = null;

    private readonly Collection $products;

    /**
     * Basket constructor.
     */
    public function __construct(Jurisdiction $jurisdiction)
    {
        $this->rate = $jurisdiction->rate();
        $this->currency = $jurisdiction->currency();
        $this->products = new Collection();
    }

    /**
     * @return mixed
     */
    public function __get(mixed $key)
    {
        if (\property_exists($this, $key)) {
            return $this->{$key};
        }

        return null;
    }

    /**
     * @return mixed
     */
    public function rate()
    {
        return $this->rate;
    }

    public function currency(): Currency
    {
        return $this->currency;
    }

    public function products(): Collection
    {
        return $this->products;
    }

    public function count(): int
    {
        return $this->products->count();
    }

    /**
     * @return mixed
     */
    public function pick(mixed $sku)
    {
        return $this->products->get($sku);
    }

    public function add(Product $product): void
    {
        $this->products->add($product->sku, $product);
    }

    public function update($sku, \Closure $action): void
    {
        $product = $this->pick($sku);

        $product->action($action);
    }

    public function remove($sku): void
    {
        $this->pick($sku);

        $this->products->remove($sku);
    }

    public function flush(): void
    {
        foreach ($this->products as $product) {
            $this->remove($product->sku);
        }
    }

    public function has($sku): bool
    {
        return $this->products->containsKey($sku);
    }

    public function discount(Discount $discount): void
    {
        $this->discount = $discount;
    }

    public function delivery(Money $money): void
    {
        $this->delivery = $money;
    }

    public function isEmpty(): bool
    {
        return $this->products->isEmpty();
    }
}
