<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Formatters;

use BaseCodeOy\Basket\Contracts\Formatter;

final class CategoryFormatter implements Formatter
{
    /**
     * @param mixed $value
     */
    #[\Override()]
    public function format($value): string
    {
        $namespace = \explode('\\', $value::class);
        $class = \array_pop($namespace);
        $regex = '/(?<!^)((?<![[:upper:]])[[:upper:]]|[[:upper:]](?![[:upper:]]))/';

        return \preg_replace($regex, ' $1', $class);
    }
}
