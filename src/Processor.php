<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket;

use BaseCodeOy\Basket\Contracts\Reconciler;

final class Processor
{
    /**
     * Processor constructor.
     *
     * @param array $metadata
     */
    public function __construct(
        /** @var Reconciler */
        private readonly Reconciler $reconciler,
        private $metadata = [],
    ) {}

    public function process(Basket $basket): Order
    {
        $meta = $this->meta($basket);
        $products = $this->products($basket);
        $delivery = $basket->delivery;

        return new Order($meta, $products, $delivery);
    }

    public function meta(Basket $basket): array
    {
        $meta = [];

        foreach ($this->metadata as $item) {
            $meta[$item->name()] = $item->generate($basket);
        }

        return $meta;
    }

    public function products(Basket $basket): array
    {
        $products = [];

        foreach ($basket->products() as $collection) {
            $products[] = [
                'sku' => $collection->sku,
                'name' => $collection->name,
                'price' => $collection->price,
                'rate' => $collection->rate,
                'quantity' => $collection->quantity,
                'freebie' => $collection->freebie,
                'taxable' => $collection->taxable,
                'delivery' => $collection->delivery,
                'coupons' => $collection->coupons,
                'tags' => $collection->tags,
                'discounts' => $collection->discounts,
                'attributes' => $collection->attributes,
                'category' => $collection->category,
                'total_value' => $this->reconciler->value($collection),
                'total_discount' => $this->reconciler->discount($collection),
                'total_delivery' => $this->reconciler->delivery($collection),
                'total_tax' => $this->reconciler->tax($collection),
                'subtotal' => $this->reconciler->subtotal($collection),
                'total' => $this->reconciler->total($collection),
            ];
        }

        return $products;
    }
}
