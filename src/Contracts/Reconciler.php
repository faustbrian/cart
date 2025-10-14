<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Contracts;

use BaseCodeOy\Basket\Product;

interface Reconciler
{
    /**
     * @return mixed
     */
    public function value(Product $product);

    /**
     * @return mixed
     */
    public function discount(Product $product);

    /**
     * @return mixed
     */
    public function delivery(Product $product);

    /**
     * @return mixed
     */
    public function tax(Product $product);

    /**
     * @return mixed
     */
    public function subtotal(Product $product);

    /**
     * @return mixed
     */
    public function total(Product $product);
}
