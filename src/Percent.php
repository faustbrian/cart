<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket;

final readonly class Percent
{
    /**
     * Percent constructor.
     */
    public function __construct(
        private mixed $value,
    ) {}

    /**
     * @return mixed
     */
    public function int()
    {
        return $this->value;
    }
}
