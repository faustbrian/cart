<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket;

use BaseCodeOy\Basket\Formatters\CategoryFormatter;
use BaseCodeOy\Basket\Formatters\CollectionFormatter;
use BaseCodeOy\Basket\Formatters\CouponFormatter;
use BaseCodeOy\Basket\Formatters\MoneyFormatter;
use BaseCodeOy\Basket\Formatters\PercentFormatter;
use BaseCodeOy\Basket\Formatters\QuantityFormatter;
use BaseCodeOy\Basket\Formatters\TaxRateFormatter;

final class Converter
{
    private array $formatters;

    /**
     * Converter constructor.
     */
    public function __construct(array $formatters = [])
    {
        $bootstrap = [
            'Category' => new CategoryFormatter(),
            'Collection' => new CollectionFormatter(),
            'Coupon' => new CouponFormatter(),
            'Money' => new MoneyFormatter(),
            'Percent' => new PercentFormatter(),
            'PercentageDiscount' => new PercentFormatter(),
            'TaxRate' => new TaxRateFormatter(),
            'QuantityDiscount' => new QuantityFormatter(),
            'ValueDiscount' => new MoneyFormatter(),
        ];

        $this->formatters = \array_merge($bootstrap, $formatters);
    }

    /**
     * @return array
     */
    public function convert(mixed $value)
    {
        if (!\is_object($value)) {
            return $value;
        }

        if ($value instanceof Collection) {
            return $value->map(fn ($item) => $this->formatter($item)->format($item))->toArray();
        }

        return $this->formatter($value)->format($value);
    }

    /**
     * @return mixed
     */
    public function formatter(mixed $object)
    {
        $interfaces = \class_implements($object);

        foreach ($interfaces as $interface) {
            $class = $this->getClassName($interface);

            if ($object instanceof Collection && $object->first() instanceof Coupon) {
                return $this->formatters['Coupon'];
            }

            if (\array_key_exists($class, $this->formatters)) {
                return $this->formatters[$class];
            }
        }

        $class = $this->getClassName($object::class);

        return $this->formatters[$class];
    }

    private function getClassName(mixed $namespace): string
    {
        $namespace = \explode('\\', (string) $namespace);

        return \array_pop($namespace);
    }
}
