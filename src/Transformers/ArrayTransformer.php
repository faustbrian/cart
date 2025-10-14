<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Transformers;

use BaseCodeOy\Basket\Order;

final class ArrayTransformer extends AbstractTransformer
{
    /**
     * @return mixed
     */
    #[\Override()]
    public function transform(Order $order)
    {
        return $this->build($order);
    }
}
