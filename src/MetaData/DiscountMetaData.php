<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\MetaData;

use BaseCodeOy\Basket\Basket;
use BaseCodeOy\Basket\Contracts\MetaData;
use BaseCodeOy\Basket\Contracts\Reconciler;
use Money\Money;

final class DiscountMetaData implements MetaData
{
    use Traits\ApplyDiscount;

    /**
     * DiscountMetaData constructor.
     */
    public function __construct(
        /** @var Reconciler */
        private Reconciler $reconciler,
    ) {}

    #[\Override()]
    public function generate(Basket $basket): Money
    {
        foreach ($basket->products() as $collection) {
            $total = $total->add($this->reconciler->discount($collection));
        }

        if (($discount = $basket->discount) instanceof \BaseCodeOy\Basket\Contracts\Discount) {
            return $this->calculateTotalWithDiscount($basket, $discount);
        }

        return new Money(0, $basket->currency());
    }

    #[\Override()]
    public function name(): string
    {
        return 'discount';
    }
}
