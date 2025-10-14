<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\MetaData\Traits;

use BaseCodeOy\Basket\Basket;
use BaseCodeOy\Basket\Contracts\Discount;
use BaseCodeOy\Basket\Discounts\PercentageDiscount;
use BaseCodeOy\Basket\Discounts\QuantityDiscount;
use BaseCodeOy\Basket\Discounts\ValueDiscount;
use Money\Money;

trait ApplyDiscount
{
    /**
     * @return Money
     */
    public function calculateTotalDiscount(Basket $basket, Discount $discount, Money $money)
    {
        // Handle a ValueDiscount
        if ($discount instanceof ValueDiscount) {
            $money = $this->subtractValueDiscount($money, $discount);
        }

        // Handle a PercentageDiscount
        if ($discount instanceof PercentageDiscount) {
            $money = $this->subtractPercentageDiscount($money, $discount);
        }

        // Handle a QuantityDiscount
        if ($discount instanceof QuantityDiscount) {
            // Calculate the total quantity of items ordered
            $totalQuantity = 0;

            foreach ($basket->products() as $collection) {
                $totalQuantity += $collection->quantity;
            }

            $quantityDiscount = $discount->rate();

            // Handle a ValueDiscount within a QuantityDiscount
            if ($quantityDiscount instanceof ValueDiscount) {
                $money = $this->subtractValueDiscount($money, $quantityDiscount);
            }

            // Handle a PercentageDiscount within a QuantityDiscount
            if ($quantityDiscount instanceof PercentageDiscount) {
                $money = $this->subtractPercentageDiscount($money, $quantityDiscount);
            }
        }

        return $money;
    }

    /**
     * @param  Basket $discount
     * @return Money
     */
    public function calculateTotalWithDiscount(Basket $basket, Discount $discount): Money|ValueDiscount
    {
        // Setup 0 value total
        $total = new Money(0, $basket->currency());

        // Calculate the total of all products
        foreach ($basket->products() as $collection) {
            $total = $total->add($this->reconciler->total($collection));
        }

        // Handle a ValueDiscount
        if ($discount instanceof ValueDiscount) {
            return $discount->rate();
        }

        // Handle a PercentageDiscount
        if ($discount instanceof PercentageDiscount) {
            return $total->multiply($discount->rate()->int() / 100);
        }

        // Handle a QuantityDiscount
        if ($discount instanceof QuantityDiscount) {
            // Calculate the total quantity of items ordered
            $totalQuantity = 0;

            foreach ($basket->products() as $collection) {
                $totalQuantity += $collection->quantity;
            }

            $quantityDiscount = $discount->rate();

            // Handle a ValueDiscount within a QuantityDiscount
            if ($quantityDiscount instanceof ValueDiscount) {
                return $quantityDiscount;
            }

            // Handle a PercentageDiscount within a QuantityDiscount
            if ($quantityDiscount instanceof PercentageDiscount) {
                return $total->multiply($quantityDiscount->int() / 100);
            }
        }

        return $total;
    }

    protected function subtractValueDiscount(Money $money, Discount $discount): Money
    {
        return $money->subtract($discount->rate());
    }

    protected function subtractPercentageDiscount(Money $money, Discount $discount): Money
    {
        return $money->subtract($money->multiply($discount->rate()->int() / 100));
    }
}
