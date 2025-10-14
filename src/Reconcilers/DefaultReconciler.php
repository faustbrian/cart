<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Reconcilers;

use BaseCodeOy\Basket\Contracts\Reconciler;
use BaseCodeOy\Basket\Product;
use Money\Money;

final class DefaultReconciler implements Reconciler
{
    #[\Override()]
    public function value(Product $product): Money
    {
        return $product->price->multiply($product->quantity);
    }

    /**
     * @return Money
     */
    #[\Override()]
    public function discount(Product $product)
    {
        $discountTotal = $this->money($product);

        // "Global" Basket Discount
        foreach ($product->discounts as $discount) {
            $discountTotal = $discountTotal->add(
                $discount->product($product)->multiply($product->quantity),
            );
        }

        // Coupons
        foreach ($product->coupons as $coupon) {
            // Each discount of an coupon
            foreach ($coupon->discounts() as $productDiscount) {
                // Calculate the amount of discount
                $discount = $productDiscount->product($product);
                $discount = $discount->multiply($product->quantity);

                // Add the discount to the discount total
                $discount = new Money($discount->getAmount(), $product->price->getCurrency());
                $discountTotal = $discountTotal->add($discount);
            }
        }

        return $discountTotal;
    }

    #[\Override()]
    public function delivery(Product $product): Money
    {
        return $product->delivery->multiply($product->quantity);
    }

    /**
     * @return Money
     */
    #[\Override()]
    public function tax(Product $product)
    {
        $money = $this->money($product);

        if (!$product->taxable || $product->freebie) {
            return $money;
        }

        $value = $this->value($product);
        $discount = $this->discount($product);

        $value = $value->subtract($discount);

        return $value->multiply($product->rate->float());
    }

    #[\Override()]
    public function subtotal(Product $product): Money
    {
        $subtotal = $this->money($product);

        if (!$product->freebie) {
            $value = $this->value($product);
            $discount = $this->discount($product);
            $subtotal = $subtotal->add($value)->subtract($discount);
        }

        $delivery = $this->delivery($product);

        return $subtotal->add($delivery);
    }

    #[\Override()]
    public function total(Product $product): Money
    {
        $tax = $this->tax($product);
        $subtotal = $this->subtotal($product);

        return $subtotal->add($tax);
    }

    private function money(Product $product): Money
    {
        return new Money(0, $product->price->getCurrency());
    }
}
