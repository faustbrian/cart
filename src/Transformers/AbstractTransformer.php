<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Transformers;

use BaseCodeOy\Basket\Contracts\Transformer;
use BaseCodeOy\Basket\Converter;
use BaseCodeOy\Basket\Order;

abstract class AbstractTransformer implements Transformer
{
    /**
     * AbstractTransformer constructor.
     */
    public function __construct(
        /** @var Converter */
        private readonly Converter $converter,
    ) {}

    /**
     * @return mixed
     */
    public function build(Order $order)
    {
        foreach ($order->meta() as $key => $total) {
            $payload[$key] = $this->converter->convert($total);
        }

        $payload['products'] = [];

        foreach ($order->products() as $product) {
            $payload['products'][] = \array_map(fn ($value) => $this->converter->convert($value), $product);
        }

        return $payload;
    }
}
