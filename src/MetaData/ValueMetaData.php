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

final class ValueMetaData implements MetaData
{
    use Traits\ApplyDiscount;

    /**
     * ValueMetaData constructor.
     */
    public function __construct(
        /** @var Reconciler */
        private Reconciler $reconciler,
    ) {}

    #[\Override()]
    public function generate(Basket $basket): Money
    {
        $total = new Money(0, $basket->currency());

        foreach ($basket->products() as $collection) {
            $total = $total->add($this->reconciler->value($collection));
        }

        if (($discount = $basket->discount) instanceof \BaseCodeOy\Basket\Contracts\Discount) {
            $total = $this->calculateTotalDiscount($basket, $discount, $total);
        }

        if ($basket->delivery instanceof Money) {
            return $total->add($basket->delivery);
        }

        return $total;
    }

    #[\Override()]
    public function name(): string
    {
        return 'value';
    }
}
